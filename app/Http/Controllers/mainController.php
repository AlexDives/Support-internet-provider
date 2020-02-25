<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.main',['role_id' => session('role_id')]);
    }

    public function loadClients()
    {
        $clients = DB::table('clients')
                    ->leftjoin('persons', 'persons.id', 'clients.person_id')
                    ->select(
                        db::raw(
                            'clients.*, concat(persons.famil, " ", persons.name, " ", persons.otch) as fio,
                             concat(persons.city, " ", persons.street, " ", persons.house, "/", persons.porch,
                             " ", persons.floor, "/", persons.flatroom) as address'
                        )
                    )
                    ->get();
        $is_internet = [];
        foreach ($clients as $client)
        {
            $session = DB::table('sessions')->where('client_id', $client->id)->orderby('date_crt', 'desc')->first();
            if (isset($session))
                if ($session->status == 'true')
                    $is_internet += [$client->id => 'Подключен'];
                else
                    $is_internet += [$client->id => 'Отключен'];
            else
                $is_internet += [$client->id => 'Отключен'];
        }
        return view('pages.ajax.listUsers', ['clients' => $clients, 'is_internet' => $is_internet]);
    }

    public function loadRequests()
    {
        $requests = DB::table('requests')
                        ->leftjoin('request_category', 'request_category.id', 'requests.category_id')
                        ->select('requests.*', 'request_category.name as category_name')
                        ->get();
        return view('pages.ajax.listRequest', ['requests' => $requests]);
    }
}
