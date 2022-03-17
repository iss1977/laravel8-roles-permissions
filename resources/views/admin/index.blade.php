@extends('layouts.app')

@section('content')
<div class="container" data-this-is-section-content-index-admin>
    <div class="row justify-content-center">
        <div class="card p-0 mb-2">
            <div class="card-header fs-3 d-flex justify-content-between align-items-center">
                Admin Dashboard - Task administration
                <button class="btn btn-sm btn-primary">Create Task</button>
            </div>
        </div>


        <div class="table-content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Task name</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Days left</th>
                        <th scope="col">User</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <th scope="row">{{$task->id}}</th>
                        <td>{{ $task->task_name }}</td>
                        <td> {{ $task->due_date->format('d-m-Y')  }} </td>
                        <td> {{ "Days left" }} </td>
                        <td> {{ $task->user->name }} </td>
                        <td class="d-flex">
                            <a class="btn btn-sm btn-primary me-2" href="{{ route('admin.tasks.show', $task->id) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.tasks.destroy', $task->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    {{$tasks->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
