<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Contact;
use App\Models\Template;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class DeleteTask extends Controller
{
    public function deletetask($id){

        $task = Task::findOrFail($id);

        $sender_name = Auth::user()->name;

        $rawtitle = Task::select('title')->where('id', $id)->get();
            $title = $rawtitle->first()->title;

        $rawcontent = Task::select('email_content')->where('id', $id)->get();
            $ncontent = $rawcontent->first()->email_content;

        $emailto = Task::select('emailto')->where('id', $id)->get();
        $remailto = $emailto->first()->emailto;
        $checkemail = is_null($remailto);

        if ($checkemail == '1') {
            $task->delete();
            return redirect('/tasks');
        }
        else {
            $address = Contact::select('email')->where('id', $remailto)->get();

            $template = Task::select('template')->where('id', $id)->get();
            $rtemplate = $template->first()->template;
            $ctemplate = Template::select('content')->where('id', $rtemplate)->get();
            $cctemplate = $ctemplate->first()->content;


            $emailto_fn = Contact::select('firstname')->where('id', $remailto)->get();
            $firstname = $emailto_fn->first()->firstname;

            $emailto_ln = Contact::select('lastname')->where('id', $remailto)->get();
            $lastname = $emailto_ln->first()->lastname;

            $content = str_replace('{snippet}', $ncontent, $cctemplate);

            $subject = $title;

            $details = [
               'title' => 'Hello '.$firstname.',',
               'body' => $content,
               'name' => $sender_name
            ];
            \Mail::to($address)->send(new \App\Mail\TaskCompleted($details, $title));

            $task->delete();
            return redirect('/tasks');
        }

    }
    public function deletetask_noemail($id){
        $user_id = Auth::user()->id;

        $task = Task::findOrFail($id);

            $task->delete();
            return redirect('/tasks');

    }
}
