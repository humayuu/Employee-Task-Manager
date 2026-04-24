<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['user'])->paginate(10);
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('status', 'active')->where('role', '!=', 'admin')->get();
        return view('task.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        try {
            Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id,
                'due_date' => $request->due_date,
            ]);

            return redirect()->back()->with('success', 'Task Create Successfully');
        } catch (Throwable $e) {
            Log::error('Error in creating task ' . $e->getMessage());

            return redirect()->back()->with('error', 'Error in create task')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $user = User::findOrFail($task->user_id);
        return view('task.show', compact('task', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::all();
        return view('task.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        try {
            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id,
                'due_date' => $request->due_date,
            ]);

            return redirect()->back()->with('success', 'Task Updated Successfully');
        } catch (Throwable $e) {
            Log::error('Error in creating task ' . $e->getMessage());

            return redirect()->back()->with('error', 'Error in update task')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $task->delete();
            return redirect()->back()->with('success', 'Task Deleted Successfully');
        } catch (Throwable $e) {
            Log::error('Error in task  deletion' . $e->getMessage());

            return redirect()->back()->with('error', 'Error in delete task');
        }
    }
}