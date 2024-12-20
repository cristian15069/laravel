<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task['tasks']= Task::all();
        return view('task.index' , $task);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $task = $request->all();
        Task::create($task);
        return redirect('/')->with('success', 'Task add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        session( ['editTaskId' => $id] );
        return redirect('/');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $task = Task::findOrFail ($id);
        $task->task = $request->input('taskUpdate');
        $task->save();
        session()->forget('editTaskId');
        return redirect('/')->with('success', 'Task update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/')->with('danger', 'Task delete successfully');
    }
}
