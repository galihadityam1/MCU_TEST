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
}
