<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    public function index()
    {
        $emps = employees::all();
        return response()->json($emps);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string',
            'email' => 'required|string|email|unique:employees,email',
            'jobtitle' => 'required|string',
            'country' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            employees::create([
                'FullName' => $request->fullname,
                'Email' => $request->email,
                'JobTitle' => $request->jobtitle,
                'Country' => $request->country,
                'Password' => Hash::make($request->password),
            ]);

            return response()->json(['message' => 'Employee saved successfully'], 201);
        } catch (Exception $e) {
            Log::error('Error storing employee: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $emp = employees::find($id);
        return response()->json($emp);
    }


  
    public function destroy($employee)
    {
        $employees = employees::find($employee);
        $employees->delete();
        return response()->json(['msg' => 'deleted sucssefuly'] );
    }


    public function update(Request $request, $employees)
    {
        $emp = employees::findOrFail($employees);
        

        if(!$employees){
            return response()->json(['msj' => 'employee not found']);
        }
        
            $validator = Validator::make($request->all(), [
                'fullname' => 'string',
                'email' => 'string|email|unique:employees,email',
                'jobtitle' => 'string',
                'country' => 'string',
                'password' => 'string|min:8',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            try{
                $emp->update([
                'FullName' => $request->fullname,
                'Email' => $request->email,
                'JobTitle' => $request->jobtitle,
                'Country' => $request->country,
                'Password' => Hash::make($request->password),
                ]);
                return response()->json(['msj' => 'Employee updated successfully'], 200);
            }catch(Exception $e){
                return response()->json(['err' => $e->getMessage()]);
            }
        }
    }