<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use App\Http\Controllers\Controller;


class TaskController extends Controller
{
    public function index(){
        $tasks = auth()->user()->tasks;

        return view('user.tasks.index', compact('tasks'));
    }
}
