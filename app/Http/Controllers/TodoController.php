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
        ]);

        Todo::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Todo added!');
    }
}