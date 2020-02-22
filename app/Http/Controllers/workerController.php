<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class workerController extends Controller
{

    public function index()
    {
        $roles = workerController::loadRoles();
        $users = workerController::loadUsers();
        $departaments = workerController::loadDepartaments();
        $userStatus = [];
        foreach ($users as $user) {
            $timestampStart = strtotime($user->last_active);
            $timestampEnd = time();
            $seconds = ($timestampEnd - $timestampStart);
            $userStatus += [$user->id => $seconds >= 120 ? 'offline' : 'online'];
        }
        return view('pages.workers', [
            'roles' => $roles,
            'users' => $users,
            'departaments' => $departaments,
            'userStatus' => $userStatus
        ]);
    }

    public function workersList(Request $request)
    {
        $users = workerController::loadUsers();
        $userStatus = [];
        foreach ($users as $user) {
            $timestampStart = strtotime($user->last_active);
            $timestampEnd = time();
            $seconds = ($timestampEnd - $timestampStart);
            $userStatus += [$user->id => $seconds >= 120 ? 'offline' : 'online'];
        }
        return view('pages.ajax.workersList', [
            'users' => $users,
            'userStatus' => $userStatus
        ]);
    }

    public function loadRoles()
    {
        return DB::table('roles')->get();
    }

    public function loadUsers()
    {
        return DB::table('users')
            ->leftjoin('departaments', 'departaments.id', 'users.departament_id')
            ->select('users.*', 'departaments.name as departament_name')
            ->get();
    }
    public function loadDepartaments()
    {
        return DB::table('departaments')->orderBy('name')->get();
    }
    public function save(Request $request)
    {
         if ($request->uid <= 0) 
         {
            $id = DB::table('users')->insertGetId(
                [
                    'login' => $request->login, 'password' => Hash::make($request->password),
                    'famil' => $request->famil, 'name' => $request->name, 'otch' => $request->otch,
                    'departament_id' => $request->departaments, 'doljn' => $request->doljn, 'aud_num' => $request->aud_num,
                    'tel_num' => $request->tel_num, 'role_id' => $request->role_id
                ]
            );
            return $id;
        }
        else if ($request->uid > 0) 
        {
            if ($request->password == null && $request->password_two == null) {
                DB::table('users')->where('id', $request->uid)->update(
                    [
                        'login' => $request->login, 'famil' => $request->famil, 'name' => $request->name,
                        'otch' => $request->otch, 'departament_id' => $request->departaments, 'doljn' => $request->doljn,
                        'aud_num' => $request->aud_num, 'tel_num' => $request->tel_num, 'role_id' => $request->role_id
                    ]
                );
            } 
            else if (trim($request->password) != '' && trim($request->password_two) != '' && $request->password == $request->password_two) 
            {
                DB::table('users')->where('id', $request->uid)->update(
                    [
                        'login' => $request->login, 'password' => Hash::make($request->password),
                        'famil' => $request->famil, 'name' => $request->name, 'otch' => $request->otch,
                        'departament_id' => $request->departaments, 'doljn' => $request->doljn, 'aud_num' => $request->aud_num,
                        'tel_num' => $request->tel_num, 'role_id' => $request->role_id
                    ]
                );
            }
            return $request->uid;
        }
        return -1;
    }
    public function delete(Request $request)
    {
        DB::table('users')->where('id', $request->uid)->delete();
        return 1;
    }

}
