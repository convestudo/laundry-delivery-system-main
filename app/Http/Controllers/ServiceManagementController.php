<?php

namespace App\Http\Controllers;

use App\Models\ServiceManagement;
use App\Models\ServiceBagDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all service management records
        $services = ServiceManagement::paginate(10);
        return view('service.index', compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'service_name' => 'required|string',
            'service_desc' => 'required|string',
            'calculate_by' => 'required|in:piece,weight',
            'pieces_price' => 'nullable|numeric',
            'bag_size' => 'nullable|array',
            'bag_size.*' => 'in:small,medium,large',
            'weight_per_kg' => 'nullable|array',
            'weight_per_kg.*' => 'in:8kg,15kg,30kg',
            'price' => 'nullable|array',
            'price.*' => 'nullable|numeric',
            'service_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        $request->validate($rules);

        try {

            $imagePath = null;
            if ($request->hasFile('service_img')) {
                $imagePath = $request->file('service_img')->store('services', 'public');
            }

            // Save service info
            $service = ServiceManagement::create([
                'service_name' => $request->input('service_name'),
                'service_desc' => $request->input('service_desc'),
                'calculate_by' => $request->input('calculate_by'),
                'pieces_price' => $request->input('calculate_by') === 'piece' ? $request->input('pieces_price') : 0,
                'service_img' => $imagePath,
            ]);

            // Save bags if it's weight-based
            if ($request->input('calculate_by') === 'weight') {
                $bagSizes = $request->input('bag_size', []);
                $weights = $request->input('weight_per_kg', []);
                $prices = $request->input('price', []);

                foreach ($bagSizes as $index => $size) {
                    if (isset($weights[$index], $prices[$index])) {
                        ServiceBagDetail::create([
                            'service_management_id' => $service->id,
                            'bag_size' => $size,
                            'weight_per_kg' => $weights[$index],
                            'price' => $prices[$index],
                        ]);
                    }
                }
            }
            return redirect()->route('services.index')->with('success', 'Service created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('services.index')->with('error', 'Something went wrong. Please try again.');
        }


    }


    /**
     * Display the specified resource.
     */
    public function show(ServiceManagement $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = ServiceManagement::with('bagDetails')->findOrFail($id);
        return view('service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = ServiceManagement::findOrFail($id);

        $request->validate([
            'service_name' => 'required|string',
            'service_desc' => 'required|string',
            'calculate_by' => 'required|in:piece,weight',
            'pieces_price' => 'nullable|numeric',
            'bag_size' => 'nullable|array',
            'price' => 'nullable|array',
            'service_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('service_image')) {
            // Delete old image if exists
            if ($service->service_img && Storage::disk('public')->exists($service->service_img)) {
                Storage::disk('public')->delete($service->service_img);
            }
            // Save filename to DB
            $service->service_img =  $request->file('service_image')->store('services', 'public');
            $service->save();
        }

        $service->update([
            'service_name' => $request->service_name,
            'service_desc' => $request->service_desc,
            'calculate_by' => $request->calculate_by,
            'pieces_price' => $request->calculate_by === 'piece' ? $request->pieces_price : 0,
        ]);

        // Delete old bags and recreate them
        $service->bagDetails()->delete();

        if ($request->calculate_by === 'weight') {

            foreach ($request->bag_size as $index => $size) {
                $service->bagDetails()->create([
                    'bag_size' => $size,
                    'weight_per_kg' => $this->getWeightFromSize($size),
                    'price' => $request->price[$index],
                ]);
            }
        }

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    private function getWeightFromSize($size)
    {
        return match($size) {
            'small' => '8kg',
            'medium' => '15kg',
            'large' => '30kg',
            default => '8kg'
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceManagement $service)
    {
        if ($service->service_img && Storage::disk('public')->exists($service->service_img)) {
            Storage::disk('public')->delete($service->service_img);
        }
        $service->delete(); // equivalent to delete from table_name where id="";

        return redirect()->route('services.index')->with('success', 'Service deleted successfully');
    }

}
