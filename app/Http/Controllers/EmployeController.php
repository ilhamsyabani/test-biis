<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employe;
use App\Models\Regency;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Employe::with(['role', 'department'])->select('employes.*');

            return DataTables::of($data)
                ->addColumn('role', function ($row) {
                    return $row->role ? $row->role->role_name : '-';
                })
                ->addColumn('department', function ($row) {
                    return $row->department ? $row->department->department_name : '-';
                })
                ->make(true);
        }

        return view('pages.pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $departemens = Department::all();
        $regions = Regency::all();

        return view('pages.pegawai.create', compact('roles', 'departemens', 'regions'));
    }


    public function uploadPhoto(Request $request)
    {
        // Validate the uploaded file
        $request->validate(['photo' => 'required|image']);
        $path = $request->file('photo')->store('photos');
        return response()->json(['path' => $path]);
    }

    public function uploadDocs(Request $request)
    {
        // Validate the uploaded file
        $request->validate(['file' => 'required|file|mimes:pdf,doc,docx']);
        $path = $request->file('file')->store('documents', 'public');
        return response()->json(['path' => $path]);
    }

    public function checkEmail(Request $request)
    {
        $emailExists = Employe::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'place_birth' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'id_departemen' => 'required|exists:departments,id',
            'id_role' => 'required|exists:roles,id',
            'joining_date' => 'required|date',
            'status' => 'required|string|max:50',
            'filePath' => 'nullable|string',
        ]);


        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        } else {
            $photoPath = null; // Handle no file uploaded
        }

        $employee = Employe::create([
            'nama' => $validated['nama'],
            'nip' => $validated['nip'],
            'photo' => $photoPath,
            'place_birth' => $validated['place_birth'],
            'date_birth' => $validated['date_birth'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'id_departemen' => $validated['id_departemen'],
            'id_role' => $validated['id_role'],
            'joining_date' => $validated['joining_date'],
            'status' => $validated['status'],
            'document' =>  $validated['filePath'],
        ]);


        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $employe = Employe::find($id);
        if ($employe == null) {
            return view('pages.error.404');
        }
        return view('pages.pegawai.show', compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employe = Employe::find($id);
        return view('pages.pegawai.edit', compact('employe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'place_birth' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'id_departemen' => 'required|exists:departments,id',
            'id_role' => 'required|exists:roles,id',
            'joining_date' => 'required|date',
            'status' => 'required|string|max:50',
            'filePath' => 'nullable|string',
        ]);

        $employee = Employe::findOrFail($id);

        // Handle file upload for photo
        if ($request->hasFile('photo')) {
            if ($employee->photoPath && Storage::disk('public')->exists($employee->photoPath)) {
                Storage::disk('public')->delete($employee->photoPath);
            }

            $photoPath = $request->file('photo')->store('photos', 'public');
        } else {
            $photoPath = $employee->photoPath;
        }

        // Handle file upload for document
        if ($request->filePath != $employee->document) {

            if ($employee->document && Storage::disk('public')->exists($employee->document)) {
                Storage::disk('public')->delete($employee->document);
            }

            $document = $request->file('file')->store('documents', 'public');
        } else {
            $document = $employee->document;
        }
        // Update 
        $employee->update([
            'nama' => $validated['nama'],
            'nip' => $validated['nip'],
            'photo' => $photoPath,
            'place_birth' => $validated['place_birth'],
            'date_birth' => $validated['date_birth'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'id_departemen' => $validated['id_departemen'],
            'id_role' => $validated['id_role'],
            'joining_date' => $validated['joining_date'],
            'status' => $validated['status'],
            'document' =>  $document,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employe::findOrFail($id);
        if ($employee->photo && Storage::disk('public')->exists($employee->photo)) {
            Storage::disk('public')->delete($employee->photo);
        }

        if ($employee->document && Storage::disk('public')->exists($employee->document)) {
            Storage::disk('public')->delete($employee->document);
        }

        $employee->delete();

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai dan dokumen berhasil dihapus!');
    }
}
