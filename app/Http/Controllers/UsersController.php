<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function Store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return response()->json(['success' => 'User created successfully'], 201);
        
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'message' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error during registration', 'message' => $e->getMessage()], 500);
        }
    }
    

}