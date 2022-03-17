<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TaskController extends Controller
{
    public function index(){
        $tasks = Task::with('user')->orderBy('due_date')->paginate(20);
        return view('admin.index', compact('tasks'));
    }

    /** Show a task for editing */

    public function show(Task $task){
        return "Editing task - not implemented. If this is displayed, you have the permission to do it.";
    }

    /** Update a task */
    public function update(Request $request, Task $task){

        return redirect()->route('admin.tasks.index')->with('success','Task Updated');
    }

    public function destroy(Request $request, Task $task){
        $task->delete();
        return redirect()->route('admin.tasks.index')->with('success','Task Deleted');
    }
}
