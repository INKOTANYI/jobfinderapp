<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;

class ProvinceController extends Controller
{


  
    public function create()
    {
        return view('create-provinces');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
           
        ]);
        Province::create([
            'name' => $request->input('name'),
            
        ]);

        return redirect()->route('province.create')->with('success', 'Item saved successfully!');


}

public function getDistrict($province_id)
    {
        $getdistricts = District::where('province_id', $province_id)->get();

        return response()->json($getdistricts);
    }





}
