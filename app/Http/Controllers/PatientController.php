<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // GET /get-patients
    public function getPatients()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    // POST /add-patients
    public function addPatient(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|string',
            // Add more validation rules as needed
        ]);

        $patient = Patient::create($request->all());

        return response()->json([
            'message' => 'Patient added successfully',
            'patient' => $patient
        ], 201);
    }

    // PUT /edit-patients/{id}
    public function editPatient(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string',
            'age' => 'sometimes|required|integer',
            'gender' => 'sometimes|required|string',
            // Add more validation rules as needed
        ]);

        $patient->update($request->all());

        return response()->json([
            'message' => 'Patient updated successfully',
            'patient' => $patient
        ]);
    }

    // DELETE /delete-patients/{id}
    public function deletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return response()->json([
            'message' => 'Patient deleted successfully'
        ]);
    }
}
