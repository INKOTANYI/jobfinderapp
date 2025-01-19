<?php

namespace App\Http\Controllers;
use App\Models\Province;
use App\Models\District;
use App\Models\Sector;
use App\Models\Departement;
use App\Models\Engineer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;




class EngineerController extends Controller
{

    public function index()
    {
        $provinces = Province::all();
        $districts = District::all();
        $sectors = Sector::all();
        $departements = Departement::all();
        // $count = Engineer::where('department', 'Electronics')->count();
        return view('application', compact(['provinces'
           ,'districts',
           'sectors',
           'departements',
           
    ]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:engineers,email',
            'phone' => [
                'required',
                'regex:/^07(8|2|3)\d{7}$/', // Rwandan phone number format
                'unique:engineers,phone',
            ],
            'departement_id' => 'required|exists:departements,id',
            'cv_path' => 'required|mimes:pdf|max:5120', // Max file size 5MB
            'degree_path' => 'required|mimes:pdf|max:5120', // Max file size 5MB
            'nida_path' => 'required|mimes:pdf|max:5120', // Max file size 5MB
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
        

        // return redirect()->route('homepage')->with('success', 'Engineer information and files saved successfully!');

        return redirect()->route('homepage')->with('success', 'Engineer information and files saved successfully!');
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

    public function searchEngineer(Request $request)
{
    $query = Engineer::query();

    if ($request->has('department') && $request->department != '') {
        $query->where('department_id', $request->department);
    }

    if ($request->has('district') && $request->district != '') {
        $query->where('district_id', $request->district);
    }

    if ($request->has('sector') && $request->sector != '') {
        $query->where('sector_id', $request->sector);
    }

    $engineers = $query->get(); // Fetch engineers based on filters

    return view('engineer.search-results', compact('engineers'));
}


    public function showElectronicsEngineers()
    {
        // Retrieve engineers from Electronics department
        $engineersCount = Engineer::where('department', 'Electronics')->get();

        // Count the number of engineers in the Electronics department
        $count =  $engineersCount->count();

        // Pass data to the Blade template
        return view('homepage', [
            'engineers' =>  $engineersCount,
            'count' => $count
        ]);
    }

    public function getEngineersData()
{
    $engineers = Engineer::with('department', 'district', 'sector')->select('engineers.*');
    return DataTables::of($engineers)
        ->editColumn('cv_path', function ($engineer) {
            return $engineer->cv_path ? asset('storage/' . $engineer->cv_path) : null;
        })
        ->editColumn('degree_path', function ($engineer) {
            return $engineer->degree_path ? asset('storage/' . $engineer->degree_path) : null;
        })
        ->make(true);
}

public function validateEngineer(Request $request)
{
    // Validate the email against the database for uniqueness
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:engineers,email',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    return response()->json(['message' => 'Validation passed.'], 200);
}

public function searchEngineeris(Request $request)
{
    $query = Engineer::query();

    if ($request->departement) {
        $query->where('departement_id', $request->departement);
    }
    if ($request->district) {
        $query->where('district_id', $request->district);
    }
    if ($request->sector) {
        $query->where('sector_id', $request->sector);
    }

    $engineers = $query->get();

    return response()->json($engineers);
}


public function searchEngineers(Request $request)
{
    $departementId = $request->departement_id;
    $districtId = $request->district_id;
    $sectorId = $request->sector_id;

    // Perform the query to get the engineers data
    $engineers = Engineer::where('departement_id', $departementId)
                         ->where('district_id', $districtId)
                         ->where('sector_id', $sectorId)
                         ->get();

    // Return the data as JSON, formatted for DataTable
    return response()->json($engineers);
}


public function softwareengineers()
{
    // Count engineers in the Software Engineering department
    $softwareEngineersCount = Departement::where('name', 'Software Engineering')
        ->withCount('engineers')
        ->first()
        ->engineers_count ?? 0;

    return view('welcome', compact('softwareEngineersCount'));
}
public function checkPhoneNumber(Request $request)
{
    $phone = $request->input('phone');

    // Validate phone format
    $isValidPhone = preg_match('/^07[2-8]\d{7}$/', $phone);

    if (!$isValidPhone) {
        return response()->json([
            'valid' => false,
            'exists' => false,
            'message' => 'Invalid phone number format. It must be 10 digits and start with 072-078.',
        ]);
    }

    // Check if the phone exists
    $exists = Engineer::where('phone', $phone)->exists();

    return response()->json([
        'valid' => true,
        'exists' => $exists,
        'message' => $exists ? 'This phone number is already taken.' : '',
    ]);
}

public function checkEmail(Request $request)
{
    $email = $request->input('email');

    // Validate email format
    $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!$isValidEmail) {
        return response()->json([
            'valid' => false,
            'exists' => false,
            'message' => 'Invalid email format.',
        ]);
    }

    // Check if the email exists
    $exists = Engineer::where('email', $email)->exists();

    return response()->json([
        'valid' => true,
        'exists' => $exists,
        'message' => $exists ? 'This email address is already taken.' : '',
    ]);
}

public function createApplication()
{
    return view('application'); // Ensure this view contains only the form
}

}

