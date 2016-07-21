<?php

namespace App\Http\Controllers;

use App\Subtask;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubtasksController extends Controller
{
    private $rules = [
        'name' => 'required|min:3|max:255',
        'description' => 'min: 10'
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $subtask = new Subtask;
        $subtask->user_id = 1;
        $subtask->task_id = $request->get('_task_id');
        $subtask->name = $request->get('name');
        $subtask->description = $request->get('description');
        $subtask->save();

        return back();
    }

    public function destroy($id)
    {
        Subtask::findOrFail($id)->delete();

        return back();
    }
}
