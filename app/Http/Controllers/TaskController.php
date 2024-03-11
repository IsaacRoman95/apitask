<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    protected $task;
    public function __construct()
    {
        $this->task = new Task();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->task->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'description' => 'required',
            ]);

            $task = Task::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'completed' => false,
            ]);

            return response()->json(['task' => $task], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = $this->task->find($id);
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = $this->task->find($id);
        $task->update($request->all());
        return $task;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = $this->task->find($id);
        return $task->delete();
    }
}
