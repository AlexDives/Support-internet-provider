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
                    ->leftjoin('tariff', 'tariff.id', 'clients.tariff_id')
                    ->select(
                        db::raw(
                            'clients.*, concat(persons.famil, " ", persons.name, " ", persons.otch) as fio,
                             concat(persons.city, " ", persons.street, " ", persons.house, "/", persons.porch,
                             " ", persons.floor, "/", persons.flatroom) as address'
                        )
                    )
                    ->get();
        return view('pages.ajax.listUsers', ['clients' => $clients]);
    }

    public function loadClientInfo(Request $request)
    {
        $client = DB::table('clients')
                    ->leftjoin('persons', 'persons.id', 'clients.person_id')
                    ->leftjoin('tariff', 'tariff.id', 'clients.tariff_id')
                    ->select(
                        db::raw(
                            'clients.*, persons.famil, persons.name, persons.otch,
                             concat(persons.city, " ", persons.street, " ", persons.house, "/", persons.porch,
                             " ", persons.floor, "/", persons.flatroom) as address, persons.phoneOne,
                             persons.phoneTwo, persons.phoneThree, tariff.name as tariff_name'
                        )
                    )
                    ->where('clients.id', $request->client_id)
                    ->first();
        $trafic = DB::table('statistic')->where('client_id', $client->id)->first();
        $c = ' Kb';
        if (isset($trafic)) 
        {
            if ($trafic > 1000) { $trafic = ($trafic/1000); $c = ' Mb'; }
            if ($trafic > 1000) { $trafic = ($trafic/1000); $c = ' Gb'; }
            $trafic += $c;
        }
        else $trafic = '0 kb';
        return view('pages.ajax.userInfo', ['client' => $client, 'trafic' => $trafic]);
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
