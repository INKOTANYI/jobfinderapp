<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;

class DepartementController extends Controller
{
    public function create()
    {
        return view('create-departement');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
           
        ]);
        Departement::create([
            'name' => $request->input('name'),
            
        ]);

        return redirect()->route('departement.create')->with('success', 'Item saved successfully!');


}

}
