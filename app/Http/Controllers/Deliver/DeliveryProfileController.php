<?php

namespace App\Http\Controllers\Deliver;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DeliveryProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $delivery = Delivery::with('user')->where('user_id', $user->id)->first();
        return view('deliver.myinfo.index', compact('delivery'));

    }

    public function update(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);
        $user = $delivery->user;

        // Validate incoming data
        $validatedData = $request->validate([
            // 'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            // 'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'old' => 'required|string',
            'vehicle_type' => 'required|string',
            'plate_number' => 'required|string|max:20',
            'insurance_document' => 'nullable|file|mimes:pdf,docx|max:2048',
            'driver_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            DB::transaction(function () use ($request, $validatedData, $user, $delivery) {
                // Update user details
                $user->update([
                    // 'name' => $validatedData['name'],
                    // 'email' => $validatedData['email'],
                    'phone_number' => $validatedData['phone_number'],
                ]);


                // Update delivery driver details
                $delivery->gender = $validatedData['gender'];
                $delivery->old = $validatedData['old'];
                $delivery->vehicle_type = $validatedData['vehicle_type'];
                $delivery->plate_number = $validatedData['plate_number'];

                // Check if a new insurance document is uploaded
                if ($request->hasFile('insurance_document')) {
                    // Delete the old insurance document if it exists
                    if ($delivery->insurance_document && Storage::disk('public')->exists($delivery->insurance_document)) {
                        Storage::disk('public')->delete($delivery->insurance_document);
                    }

                    // Upload the new insurance document
                    $insurancePath = $request->file('insurance_document')->store('insurance_documents', 'public');
                    $delivery->insurance_document = $insurancePath;
                }


                if ($request->hasFile('driver_img')) {
                    if ($delivery->driver_img && Storage::disk('public')->exists($delivery->driver_img)) {
                        Storage::disk('public')->delete($delivery->driver_img);
                    }

                    $driverImgPath = $request->file('driver_img')->store('driver_images', 'public');
                    $delivery->update(['driver_img' => $driverImgPath]);
                }

                // Save the updated delivery data
                $delivery->save();
            });

            // Redirect with success message
            return redirect()->route('deliver.myinfo.index')->with('success', 'Delivery driver updated successfully.');

        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error updating delivery driver: ' . $e->getMessage());
            return back()->with('error', 'Failed to update delivery driver.')->withInput();

        }
    }
}

