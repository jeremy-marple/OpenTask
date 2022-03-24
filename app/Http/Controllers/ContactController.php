<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $userid = Auth::user()->id;

        $contact = Contact::where('user_id', $userid)->orderBy('firstname')->get();

        return view('contactfiller', [
            'contact' => $contact
        ]);

    }
    public function editcontact($id)
    {
        $userid = Auth::user()->id;

        $contact = Contact::where('id', $id)->get();

        return view('contacteditor', [
            'contact' => $contact
        ]);

    }
    public function updatecontact(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $contact = contact::where('id', $id)->first();

        #$user->update(['name' => 'abc', 'location' => 'xyz']);
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;

        $contact->save();

        return redirect('/contact/edit/' . $id);

    }

    public function deletcontact($id)
    {
        $user_id = Auth::user()->id;
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect('/contacts');

    }
}
