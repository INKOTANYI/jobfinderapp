<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Contact;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    // Store method to handle form submission
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $filePath = null;

        // Handle file upload if a file is provided
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        // Save the data to the database
        Contact::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
            'file_path' => $filePath, // Save the file path separately
        ]);

        return response()->json(['success' => 'Your message has been sent successfully!'], 200);
    }

    // Retrieve all contacts
    public function index()
    {
        return view('contacts.index');
    }

    // Download the attachment
    public function downloadAttachment($id)
    {
        $contact = Contact::find($id);

        if ($contact && $contact->file_path) {
            // Use Storage to download file from public disk
            return Storage::disk('public')->download($contact->file_path);
        }

        return redirect()->back()->with('error', 'Attachment not found.');
    }

    // Get contact data for DataTables
    public function getContactData()
    {
        $contacts = Contact::select(['id', 'name', 'email', 'subject', 'message', 'file_path', 'created_at']);
    
        return DataTables::of($contacts)
    ->addColumn('file', function ($contact) {
        return $contact->file_path
            ? '<a href="' . asset('storage/' . $contact->file_path) . '" target="_blank">Download File</a>'
            : 'No File';
    })
    ->rawColumns(['file']) // Ensures the file column renders HTML
    ->make(true);

    }

}
