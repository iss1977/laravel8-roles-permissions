<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::with('user')->orderBy('due_date')->get();

        return view('admin.index', compact('tasks'));
    }
}
