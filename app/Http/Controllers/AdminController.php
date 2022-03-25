<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {

        $count = User::select('*')->count();

        return view('landing-count', [
            'counts' => $count,
        ]);

    }
}
