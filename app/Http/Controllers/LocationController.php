<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\City;

use Illuminate\Http\Request;

class LocationController extends Controller
{
      
    public function index()
    {
        $countries = Country::all(); // Get all countries from the database
        return view('locations', compact('countries'));
    }

    // AJAX method to get cities based on country selection
    public function getCities($countryId)
    {
        $cities = City::where('country_id', $countryId)->get(); // Get cities for the selected country
        return response()->json($cities); // Return cities as JSON

}
}
