<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(Request $request)
    {
        $idRole = -1;
        if ($request->session()->has('user_id')) {
            $idRole = session('role_id');
        }
        return view('index', ['idRole' => $idRole]);
    }

    public function auth(Request $request)
    {
        $login = trim($request->login);
        $pass = trim($request->pwd);

        $login = htmlspecialchars($login);
        $login = stripslashes($login);
        $pass = htmlspecialchars($pass);
        $pass = stripslashes($pass);

        $user = DB::table('users')->where(['login' => $login])->first();

        if ($user != null) {
            if (Hash::check($pass, $user->password)) {

                session(['user_id' => $user->id, 'role_id' => $user->role_id, 'departament_id' => $user->departament_id]);
                $data = ['role_id' => $user->role_id];
                return $data;
            } else return -2;
        } else return -3;
    }
    public function quit(Request $request)
    {
        $request->session()->getHandler()->destroy($request->session()->getID());
        echo '<script>location.replace("/");</script>';
        exit;
    }
}
