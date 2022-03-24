<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Template;
use App\Models\Contact;

class EditTask extends Controller
{
    public function edittask($id)
    {
        $userid = Auth::user()->id;


        $task_at_hand = Task::where('id', $id)->get();
        $templates = Template::where('user_id', $userid)->orderBy('created_at', 'desc')->get();
        $contacts = Contact::where('user_id', $userid)->orderBy('created_at', 'desc')->get();

        return view('taskeditor', [
            'tasks' => $task_at_hand,
            'templates' => $templates,
            'contacts' => $contacts
        ]);

    }
    public function updatetask(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $task = Task::where('id', $id)->first();

        #$user->update(['name' => 'abc', 'location' => 'xyz']);
        $task->title = $request->title;
        $task->content = $request->content;
        $task->email_content = $request->email_snippet;
        $task->template = $request->template;
        $task->emailto = $request->emailto;

        $task->save();

        return redirect('/task/edit/' . $id);

    }
}
