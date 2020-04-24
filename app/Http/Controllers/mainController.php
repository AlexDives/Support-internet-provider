<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
                             persons.city, persons.street, persons.house, persons.porch,
                             persons.floor, persons.flatroom, persons.phoneOne,
                             persons.phoneTwo, persons.phoneThree, tariff.name as tariff_name'
                        )
                    )
                    ->where('clients.id', $request->client_id)
                    ->first();
        $trafic = DB::table('statistic')->where('client_id', $client->id)->first();
        $c = ' Kb';
        if (isset($trafic)) 
        {
            $t = $trafic->downloaded;
            if ($t > 1000) { $t = ($t/1000); $c = ' Mb'; }
            if ($t > 1000) { $t = ($t/1000); $c = ' Gb'; }
            $t .= $c;
        }
        else $t = '0 Kb';
        return view('pages.ajax.userInfo', ['client' => $client, 'trafic' => $t]);
    }

    public function editClientInfo(Request $request)
    {
        $pid = DB::table('clients')->where('id', $request->cid)->first()->person_id;
        DB::table('persons')->where('id', $pid)->update(
            [
                'famil' => $request->famil,
                'name' => $request->name,
                'otch' => $request->otch,
                'phoneOne' => $request->phoneOne,
                'phoneTwo' => $request->phoneTwo,
                'phoneThree' => $request->phoneThree,
                'city' => $request->city,
                'street' => $request->street,
                'house' => $request->house,
                'porch' => $request->porch,
                'floor' => $request->floor,
                'flatroom' => $request->flatroom,
            ]
        );
    }

    public function editInternet(Request $request)
    {
        $ei = $request->internet == 'T' ? 'F' : 'T';
        DB::table('clients')->where('id', $request->cid)->update(
            [
                'enable_internet' => $ei
            ]
        );
        return $ei;
    }

    public function editPass(Request $request)
    {
        if ($request->type == "stats") DB::table('clients')->where('id', $request->cid)->update(['password_statistic' => Hash::make($request->pass) ]);
        else if ($request->type == "inet") DB::table('clients')->where('id', $request->cid)->update(['password_internet' => Hash::make($request->pass) ]);
    }

    public function editIpMac(Request $request)
    {
        if (DB::table('clients')->where('ip_address', $request->ip)->where('id', '<>', $request->cid)->count() > 0) return -1;
        if (DB::table('clients')->where('mac_address', $request->mac)->where('id', '<>', $request->cid)->count() > 0 && $request->mac != "00:00:00:00:00") return -2;
        DB::table('clients')->where('id', $request->cid)->update(['ip_address' => $request->ip, 'mac_address' => $request->mac ]);
        return 0;
    }

    public function payStatistic(Request $request)
    {
        $cid = $request->cid;
        $dateStart = $request->year.'-'.$request->month.'-01 00:00:00';
        $dateEnd = $request->year.'-'.$request->month.'-31 00:00:00';
        $list = DB::table('payment_statistics')->where('client_id', $cid)->where('date_pay', '>', $dateStart)->where('date_pay', '<', $dateEnd)->get();
        return view('pages.ajax.payStatistic', ['list' => $list]);
    }
    
    public function showMessages(Request $request)
    {
        $cid = $request->cid;
        $list = DB::table('comments')->where('client_id', $cid)
            ->leftjoin('users', 'users.id', 'comments.user_id')
            ->select('comments.*', 'users.login')
            ->get();
        return view('pages.ajax.showMessage', ['list' => $list]);
    }
    
    public function sendMessages(Request $request)
    {
        $cid = $request->cid;
        $comment = $request->comment;
        
        DB::table('comments')->insert(
            [
                'client_id' => $cid,
                'user_id'   => session('user_id'),
                'comment'   => $comment
            ]
        );
    }
    
    public function showSession(Request $request)
    {
        $cid = $request->cid;
        $date_s = date('Y-m-d H:i:s', strtotime($request->date_start.' 00:00:00'));
        $date_e = date('Y-m-d H:i:s', strtotime($request->date_end.' 23:59:59'));
        $list = DB::table('sessions')
            ->leftjoin('clients', 'clients.id', 'sessions.client_id')
            ->where('sessions.client_id', $cid)
            ->where('sessions.date_update','>', $date_s)
            ->where('sessions.date_update','<', $date_e)
            ->select('sessions.*', 'clients.login_internet')
            ->get();
        return view('pages.ajax.showSession', ['list' => $list]);
    }

    public function closeSession(Request $request)
    {
        $sid = $request->sid;
        DB::table('sessions')->where('id', $sid)->update(['status' => 'false']);
    }

    public function showHistory(Request $request)
    {
        $cid = $request->cid;
        $list = DB::table('history')
                    ->leftjoin('services', 'services.id', 'history.service_id')
                    ->leftjoin('tariff', 'tariff.id', 'history.tariff_id')
                    ->leftjoin('stocks', 'stocks.id', 'history.stock_id')
                    ->where('history.client_id', $cid)
                    ->select('history.*', 'tariff.name as tname', 'tariff.cost as tcost',
                             'services.name as sname', 'services.cost as scost',
                             'stocks.name as stname', 'stocks.cost as stcost')
                    ->get();
        return view('pages.ajax.showHistory', ['list' => $list]);
    }

    public function showServices(Request $request)
    {
        $cid = $request->cid;
        $services = DB::table('services')->where('is_active', 'T')->get();
        $arr = [];
        foreach ($services as $serv) {
            $s = DB::table('history')->where('client_id', $cid)->where('service_id', $serv->id)->orderby('date_crt','desc')->first();
            if (isset($s)) {
                if (!isset($s->date_deactivation)) $s = 'checked';
                else $s = '';
            }
            else $s = '';
            $arr += [
                $serv->id => $s, 
            ];
        }
        //$history = DB::table('history')->where('client_id', $cid)->whereNotNull('service_id')->orderby('date_deactivation','desc')->get();
        return view('pages.ajax.showServices', ['services' => $services, 'arr' => $arr]);
    }

    public function editServices(Request $request)
    {
        $cid = $request->cid;
        $sid = $request->sid;
        $client = DB::table('history')->where('client_id', $cid)->where('service_id', $sid)->orderby('date_crt','desc')->first();
        if (isset($client)) {
            if (isset($client->date_deactivation)) DB::table('history')->insert(['service_id' => $sid, 'date_activation' => date("Y-m-d H:i:s",time()), 'client_id' => $cid]);
            else DB::table('history')->insert(['service_id' => $sid, 'date_deactivation' => date("Y-m-d H:i:s",time()), 'client_id' => $cid]);
        }
        else DB::table('history')->insert(['service_id' => $sid, 'date_activation' => date("Y-m-d H:i:s",time()), 'client_id' => $cid]);
    }

    public function showPing(Request $request)
    {
        $ip = DB::table('clients')->where('id', $request->cid)->first()->ip_address;
        session_write_close();
        $output = shell_exec("ping -n 4 ".$ip);
        
        return view('pages.ajax.userPing', ['resultPing' => iconv("cp866","utf-8", $output)]);
    }
}
