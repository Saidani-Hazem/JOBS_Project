<?php

namespace App\Http\Controllers;

use App\Models\employees;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emps = employees::all();
        return response()->json($emps);
    }


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = new employees();
        $employee->FullName = 'Hazeem';
        $employee->Email = 'HHHHHHHHHHHHH@example.net';
        $employee->JobTitle = 'HHHHHHHHHHH';
        $employee->Phone = '+HHHHHHHHHHHHHHH';
        $employee->Country = 'HHHHHHHHHHHHH';
        $employee->Pic = 'https://via.placeholder.com/450x450.png/00dd77?text=avatar+aliquam';
        $employee->PassWord = '1234HHHH';
        $employee->Description = 'EHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHt.';
        $employee->Hash_One = 'cuHHHHHHHHHHHHHHHHHHHa';
        $employee->Hash_Tow = 'raHHHHHHHHHHHHHHHHH';
        $employee->Hash_Three = 'doHHHHHHHHHHHHHHHHHHHHHbusHHHH';
        $employee->save();

        return response()->json($employee, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $emp = employees::find($id);
        return response()->json($emp);
    }



    public function empToUpDate($id)
    {
        $emp = employees::find($id);
        return view('welcome' , compact('emp'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,Request $request)
    {

        $request->validate([
            'FullName' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255',
            'JobTitle' => 'required|string|max:255',
            'Country' => 'required|string|max:255',
            'PassWord' => 'required|string|max:255',
        ]);

        // Récupérer l'employé par son ID
        $employee = employees::findOrFail($id);

        // Mettre à jour les champs de l'employé avec les données du formulaire
        $employee->FullName = $request->input('FullName');
        $employee->Email = $request->input('Email');
        $employee->JobTitle = $request->input('JobTitle');
        $employee->Country = $request->input('Country');
        $employee->PassWord = $request->input('PassWord');

        // Sauvegarder les modifications
        $employee->save();

        // Rediriger avec un message de succès
        return redirect('/')->with('success', 'Employee updated successfully');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employees = employees::find($id);
        $employees->delete();
        return response()->json(['msg' => 'deleted sucssefuly'] );
    }
}