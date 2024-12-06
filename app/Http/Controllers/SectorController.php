<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Sector;

use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function create()
    {
        // Get all categories to populate the select dropdown
        $districts = District::all();

        return view('create-sectors', compact('districts'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
        ]);

        // Create the product with the foreign key
        Sector::create([
            'name' => $request->input('name'),
            'district_id' => $request->input('district_id'),
        ]);

        // Redirect back with a success message
        return redirect()->route('create-sector')->with('success', 'district saved successfully!');
    }

    public function SearchSector(){


        $gasaboDistrictId = 22; // Replace with the actual ID
        $sectorsCount = Sector::where('district_id', $gasaboDistrictId)->count();

        $sectors = Sector::where('district_id', $gasaboDistrictId)->get();

        

        return view('listsectors',  [
            'sectorsCount' =>  $sectorsCount,
            'sectors' =>  $sectors

        ]);


    }

}

