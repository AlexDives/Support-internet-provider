<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class requestController extends Controller
{

    public function main(Request $request)
    {
       return view('pages.request', ['role_id' => session('role_id')]);
    }
}
