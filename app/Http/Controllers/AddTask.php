<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class AddTask extends Controller
{
    public function addtask(Request $request){
        $user_id = Auth::user()->id;

        $task = new Task();
        $task->title = $request->title;
        $task->content = $request->content;
        $task->email_content = $request->email_snippet;
        $task->template = $request->template;
        $task->emailto = $request->emailto;
        $task->user_id = $user_id;

        $task->save();

        return redirect('/tasks');
    }
}
