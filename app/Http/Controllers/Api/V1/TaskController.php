<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
 
    public function index()
    {
        return TaskResource::collection(Task::with('priority')->get());
    }

    // public function create()
    // {
    //     //
    // }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        $task->load('priority');
        return TaskResource::make($task);
    }

    public function show(Task $task)
    {
        return TaskResource::make($task);
    }


    // public function edit(Task $task)
    // {
    //     //
    // }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return TaskResource::make($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
