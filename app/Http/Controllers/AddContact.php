<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class AddContact extends Controller
{
    public function addcontact(Request $request){
        $user_id = Auth::user()->id;

        $contact = new Contact();
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->user_id = $user_id;

        $contact->save();

        return redirect('/contacts');
    }
}
