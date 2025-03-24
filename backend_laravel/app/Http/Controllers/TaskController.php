<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(TaskStoreRequest $request)
    {
        try {
            $task = Task::create($request->validated());

            return response()->json([
                'message' => 'Task created successfully!'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong"
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $task = Task::find($id);
            if(!$task) {
                return response()->json([
                    'message' => "Task not found"
                ], 404);
            }

            $data = $task;
            $task->delete();

            return response()->json([
                'message' => "Task deleted", 
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong"
            ], 500);
        }
    }
}
