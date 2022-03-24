<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Template;

class TemplateController extends Controller
{
    public function index()
    {
        $userid = Auth::user()->id;

        $template = Template::where('user_id', $userid)->orderBy('created_at', 'desc')->get();

        return view('templatefiller', [
            'template' => $template
        ]);

    }
    public function updatetemplate($id)
    {
        $userid = Auth::user()->id;

        $template = Template::where('id', $id)->get();

        return view('templateeditor', [
            'template' => $template
        ]);

    }
    public function updatetemplatereal(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $template = Template::where('id', $id)->first();

        #$user->update(['name' => 'abc', 'location' => 'xyz']);
        $template->title = $request->title;
        $template->content = $request->content;

        $template->save();

        return redirect('/template/edit/' . $id);

    }
    public function deletetemplate(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $template = Template::where('id', $id)->first();


        $template->delete();
        return redirect('/templates');

    }
}
