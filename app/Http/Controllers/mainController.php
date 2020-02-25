<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.main',['role_id' => session('role_id')]);
    }
}
