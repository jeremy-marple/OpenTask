<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Template;
use App\Models\Contact;

class TaskController extends Controller
{
    public function index()
    {
        $userid = Auth::user()->id;

        $count = Task::where('user_id', $userid)->count();

        $tasks = Task::where('user_id', $userid)->orderBy('created_at', 'desc')->get();
        $templates = Template::where('user_id', $userid)->orderBy('created_at', 'desc')->get();
        $contacts = Contact::where('user_id', $userid)->orderBy('created_at', 'desc')->get();

        return view('taskfiller', [
            'tasks' => $tasks,
            'counts' => $count,
            'templates' => $templates,
            'contacts' => $contacts
        ]);

    }
}
