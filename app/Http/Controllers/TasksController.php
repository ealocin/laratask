<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;

class TasksController extends Controller
{
    private $rules = [
        'name' => 'required|min:3|max:255'
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $task = new Task;
        $task->user_id = 1;
        $task->name = $request->get('name');
        $task->save();

        return back();
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', compact('task'));
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return  redirect('/');
    }
}
