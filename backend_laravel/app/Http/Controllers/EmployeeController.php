<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::with('tasks')->get();
        return response()->json($employee);
    }

    public function store(EmployeeStoreRequest $request){
        try{
            Employee::create([
                'name' => $request->name,
                'position' => $request->position
            ]);

            return response()->json([
                'message' => "Employee added"
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'message' => "Something went wrong"
            ], 500);
        }
    }

    public function update(EmployeeStoreRequest $request, $id)
    {
        try {
            $employee = Employee::find($id);
            if(!$employee) {
                return response()->json([
                    'message' => "Employee not found"
                ], 404);
            }

            $employee->name = $request->name;
            $employee->position = $request->position;

            $employee->save();

            return response()->json([
                'message' => "Employee updated"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong"
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $employee = Employee::find($id);
            if(!$employee) {
                return response()->json([
                    'message' => "Employee not found"
                ], 404);
            }

            $employee->delete();

            return response()->json([
                'message' => "Employee deleted"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong"
            ], 500);
        }
    }
}
