<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{




    /**
     * Display a listing of the resource.
     */
    public function index()
    {

            $todos = ToDo::where('user_id', Auth::id())->get();
        

        return view('todos.index', compact('todos'));
    }

    public function unresolved()
    {
        $todos = ToDo::where('user_id',Auth::id())->where('status',['Pending','Processing'])->orderBy('deadline','asc')->get();
        return view('todos.unresolved',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'deadline' =>'required',
            'status' => 'required|in:Pending,Processing,Completed,Cancelled',            
        ]);
        ToDo::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'deadline' =>$request->input('deadline'),
            'status' => $request->input('status'),
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = ToDo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = ToDo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'deadline' =>'required',
            'status' => 'required|in:Pending,Processing,Completed,Cancelled',            
        ]);

        $todo = ToDo::where('id',$id)->where('user_id',Auth::id())->firstOrFail();

        $todo->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'deadline' =>$request->input('deadline'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('todos.show', $todo->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = ToDo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
