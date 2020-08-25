<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function getApp(Request $request)
    {
        return view('app');
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect('/');
    }
}
