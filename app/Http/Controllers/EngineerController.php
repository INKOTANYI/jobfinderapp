<?php

namespace App\Http\Controllers;
use App\Models\Province;
use App\Models\District;
use App\Models\Sector;
use App\Models\Departement;
use App\Models\Engineer;

use Illuminate\Http\Request;

class EngineerController extends Controller
{

    public function index()
    {
        $provinces = Province::all();
        $districts = District::all();
        $sectors = Sector::all();
        $departements = Departement::all();
        return view('application', compact(['provinces'
           ,'districts',
           'sectors',
           'departements'
    ]));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'departement_id' => 'required|exists:departements,id',
            'cv_path' => 'required|mimes:pdf|max:5120', // Max 5MB
            'degree_path' => 'required|mimes:pdf|max:5120', // Max 5MB
            'nida_path' => 'required|mimes:pdf|max:5120', // Max 5MB
            'province_id' => 'required|exists:provinces,id',
            'district_id' => 'required|exists:districts,id',
            'sector_id' => 'required|exists:sectors,id',
        ]);

        // Store the files in the public storage
        $cvPath = $request->file('cv_path')->store('cvs', 'public');
        $degreePath = $request->file('degree_path')->store('degrees', 'public');
        $nidaPath = $request->file('nida_path')->store('nida', 'public');

        // Save the student information in the database
        Engineer::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'departement_id' => $request->departement_id,
            'cv_path' => $cvPath,
            'degree_path' => $degreePath,
            'nida_path' => $nidaPath,
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'sector_id' => $request->sector_id,

        ]);
        

        return back('welcome')->with('success', 'Engineer information and files saved successfully!');
    }

    public function get_All(){


        $engineers = Engineer::all();
        return view('all-engineers', compact('engineers'));
    }


    public function getBy_Departement(Request $request){

        $getBydepartments = Departement::all();

        // Check if a department_id is set in the request
        $departement_id = $request->input('department_id');

        // Query engineers based on the selected department (or show all if none is selected)
        $engineers = Engineer::with('department')
            ->when($departement_id, function ($query, $departement_id) {
                return $query->where('departement_id', $departement_id);
            })
            ->get();

        return view('engineers.index', compact('engineers', 'departments', 'department_id'));
    }




    }






    //

