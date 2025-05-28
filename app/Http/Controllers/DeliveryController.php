<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Notifications\DriverRegistered;
use Illuminate\Support\Str; // for password generation (optional)

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::with('user')->where('vehicle_type', 'car')->paginate(10);
        return view('delivery.index', compact('deliveries'));
    }

    public function edit($id)
    {
        $delivery = Delivery::findOrFail($id);
        return view('delivery.edit', compact('delivery'));
    }

    public function create()
    {
        return view('delivery.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users,name', // Ensure name is unique
            'email' => 'required|email|unique:users,email', // Ensure email is unique
            'password' => 'required|min:8',
            'phone_number' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'old' => 'required|string',
            'vehicle_type' => 'required|in:car',
            'plate_number' => 'required|string|max:20',
            'driver_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'insurance_document' => 'required|file|mimes:pdf,docx|max:2048',
        ]);

        try {
            DB::transaction(function () use ($validatedData, $request) {
                // Create the user
                $user = User::create([
                    'name' => $validatedData['name'],
                    'email' => $validatedData['email'],
                    'password' => Hash::make($validatedData['password']),
                    'phone_number' => $validatedData['phone_number'],
                    'role' => 'DeliveryDriver',
                ]);

                // Handle file upload
                $insurancePath = $request->file('insurance_document')->store('insurance_documents', 'public');
                $driverImgPath = null;
                if ($request->hasFile('driver_img')) {
                    $driverImgPath = $request->file('driver_img')->store('driver_images', 'public');
                }

                // Create the delivery record
                Delivery::create([
                    'user_id' => $user->id,
                    'gender' => $validatedData['gender'],
                    'old' => $validatedData['old'],
                    'vehicle_type' => $validatedData['vehicle_type'],
                    'plate_number' => $validatedData['plate_number'],
                    'insurance_document' => $insurancePath,
                    'driver_img' => $driverImgPath,
                ]);

                // Send email notification
                // $user->notify(new DriverRegistered($user->email, $validatedData['password']));
                $user->notify(new DriverRegistered($user->email, $validatedData['password']));

            });

            return redirect()->route('delivery.index')->with('success', 'Delivery driver registered successfully');
        } catch (\Exception $e) {
            \Log::error('Error registering delivery driver: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return back()->with('error', 'Error registering delivery driver. Please try again.')->withInput();
        }
    }

    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255|unique:users,name',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:8',
    //         'phone_number' => 'required|string|max:15',
    //         'gender' => 'required|in:male,female',
    //         'old' => 'required|string',
    //         'vehicle_type' => 'required|in:car,motorcycle',
    //         'plate_number' => 'required|string|max:20',
    //         'driver_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //         'insurance_document' => 'required|file|mimes:pdf,docx|max:2048',
    //     ]);

    //     try {
    //         DB::transaction(function () use ($validatedData, $request) {
    //             // Create the user
    //             $user = User::create([
    //                 'name' => $validatedData['name'],
    //                 'email' => $validatedData['email'],
    //                 'password' => Hash::make($validatedData['password']),
    //                 'phone_number' => $validatedData['phone_number'],
    //                 'role' => 'DeliveryDriver',
    //             ]);

    //             // Handle file upload
    //             $insurancePath = $request->file('insurance_document')->store('insurance_documents', 'public');
    //             $driverImgPath = null;
    //             if ($request->hasFile('driver_img')) {
    //                 $driverImgPath = $request->file('driver_img')->store('driver_images', 'public');
    //             }

    //             // Create the delivery record
    //             Delivery::create([
    //                 'user_id' => $user->id,
    //                 'gender' => $validatedData['gender'],
    //                 'old' => $validatedData['old'],
    //                 'vehicle_type' => $validatedData['vehicle_type'],
    //                 'plate_number' => $validatedData['plate_number'],
    //                 'insurance_document' => $insurancePath,
    //                 'driver_img' => $driverImgPath,
    //             ]);

    //             // Send email notification
    //             $user->notify(new DriverRegistered($user->email, $validatedData['password']));
    //         });

    //         return redirect()->route('delivery.index')->with('success', 'Delivery driver registered successfully');
    //     } catch (\Exception $e) {
    //         \Log::error('Error registering delivery driver: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
    //         return back()->with('error', 'Error registering delivery driver. Please try again.')->withInput();
    //     }
    // }

    public function update(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);
        $user = $delivery->user;

        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'old' => 'required|string',
            'vehicle_type' => 'required|in:car',
            'plate_number' => 'required|string|max:20',
            'insurance_document' => 'nullable|file|mimes:pdf,docx|max:2048',
            'driver_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            DB::transaction(function () use ($request, $validatedData, $user, $delivery) {
                // Update user details
                $user->update([
                    'name' => $validatedData['name'],
                    'email' => $validatedData['email'],
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
            return redirect()->route('delivery.index')->with('success', 'Delivery driver updated successfully.');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error updating delivery driver: ' . $e->getMessage());
            return back()->with('error', 'Failed to update delivery driver.')->withInput();
        }
    }



    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $delivery = Delivery::findOrFail($id);
                $delivery->user->delete();
                $delivery->delete();
            });

            return redirect()->route('delivery.index')->with('success', 'Delivery driver deleted successfully');
        } catch (\Exception $e) {
            \Log::error('Error deleting delivery driver: ' . $e->getMessage());
            return back()->with('error', 'Error deleting delivery driver. Please try again.');
        }
    }
}
