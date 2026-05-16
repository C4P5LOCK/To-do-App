<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = auth()->user()->todos()->latest()->get();

        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'due_date' => 'nullable|date',
            'due_time' => 'nullable',
        ]);

        Todo::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'due_time' => $request->due_time,
        ]);

        return redirect()->back()->with('success', 'Todo added!');
    }

    public function edit(Todo $todo){

    // security check
    if ($todo->user_id !== auth()->id()) {
        abort(403);
    }
    return view('todos.edit', compact('todo'));
    }


    public function update(Request $request, Todo $todo)
{
    if ($todo->user_id !== auth()->id()) {
        abort(403);
    }

    $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'due_date' => 'nullable|date',
        'due_time' => 'nullable',
    ]);

    $todo->update([
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
        'due_time' => $request->due_time,
    ]);

    return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
}

public function destroy(Todo $todo)
{
    if ($todo->user_id !== auth()->id()) {
        abort(403);
    }

    $todo->delete();

    return redirect()->back()->with('success', 'Todo deleted successfully!');
}

    public function toggle(Todo $todo)
{
    // Security check
    if ($todo->user_id !== auth()->id()) {
        abort(403);
    }

    $todo->update([
        'is_completed' => !$todo->is_completed
    ]);

    return redirect()->back();
}
}