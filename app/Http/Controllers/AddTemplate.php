<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use Illuminate\Support\Facades\Auth;

class AddTemplate extends Controller
{
    public function addtemplate(Request $request){
        $user_id = Auth::user()->id;

        $template = new Template();
        $template->title = $request->title;
        $template->content = $request->content;
        $template->user_id = $user_id;

        $template->save();

        return redirect('/templates');
    }
}
