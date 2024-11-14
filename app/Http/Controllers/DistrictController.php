<?php

namespace App\Http\Controllers;
use App\Models\Province;
use App\Models\District;
use App\Models\Sector;


use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function create()
    {
        // Get all categories to populate the select dropdown
        $provinces = Province::all();

        return view('create-districts', compact('provinces'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
        ]);

        // Create the product with the foreign key
        District::create([
            'name' => $request->input('name'),
            'province_id' => $request->input('province_id'),
        ]);

        // Redirect back with a success message
        return redirect()->route('create-district')->with('success', 'district saved successfully!');
    }

    public function getSector($district_id)
    {
        $getsectors = Sector::where('district_id', $district_id)->get();

        return response()->json($getsectors);
    }


}
