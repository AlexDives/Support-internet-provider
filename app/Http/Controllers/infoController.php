<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class infoController extends Controller
{
    public function index(Request $request)
    {
        $tariffs = infoController::loadTariff();
        $stocks = infoController::loadStocks();
        $services = infoController::loadServices();
        return view('pages.info', 
            [ 
                'tariffs'   => $tariffs, 
                'stocks'    => $stocks, 
                'services'  => $services, 
                'role_id'   => session('role_id')
            ]
        );
    }

    public function loadTariff()
    {
        return DB::table('tariff')->get();
    }

    public function loadStocks()
    {
        return DB::table('stocks')->get();
    }

    public function loadServices()
    {
        return DB::table('services')->get();
    }

    public function newOffer(Request $request)
    {
        $pers_id = DB::table('persons')->insertGetId(
            [
                'famil'         => $request->famil,
                'name'          => $request->name,
                'otch'          => $request->otch,
                'birthday'      => $request->birthday,
                'gender'        => $request->gender,
                'pasp_ser'      => $request->pasp_ser,
                'pasp_num'      => $request->pasp_num,
                'pasp_date'     => $request->pasp_date,
                'pasp_issue'    => $request->pasp_issue,
                'city'          => $request->city,
                'street'        => $request->street,
                'house'         => $request->house,
                'porch'         => $request->porch,
                'floor'         => $request->floor,
                'flatroom'      => $request->flatroom,
                'countRooms'    => $request->count_rooms,
                'phoneOne'      => $request->phone_one,
                'phoneTwo'      => $request->phone_two,
                'phoneThree'    => $request->phone_three
            ]
        );
        $subnet = 'lan'.rand(1, 35);
        $ip_address = DB::table('clients')->max('ip_address');
        $ip_address_array = explode('.',$ip_address);
        if ($ip_address_array[3] == '255')
        {
            $ip_address_array[2] = $ip_address_array[2]++;
            $ip_address_array[3] = 1;
        }
        else $ip_address_array[3]++;
        $new_ip = implode('.', $ip_address_array);

        $client_id = DB::table('clients')->insertGetId(
            [
                'person_id'         => $pers_id,
                'subnet'            => $subnet,
                'ip_address'        => $new_ip,
                'tariff_id'         => $request->tariff,
                'login_refer'       => $request->login_refer,
                'is_cable'          => $request->is_cable == 'on' ? 'T' : 'F',
                'is_speedConnect'   => $request->is_speedConnect == 'on' ? 'T' : 'F',
                'is_contractHome'   => $request->is_contractHome == 'on' ? 'T' : 'F'
            ]
        );
        DB::table('clients')
            ->where('id', $client_id)
            ->update([
                'login_statistic'       => (1000 + $client_id),
                'password_statistic'    => Hash::make(1000 + $client_id),
                'login_internet'        => (1000 + $client_id),
                'password_internet'     => Hash::make(1000 + $client_id),
                'lic_schet'             => (1000 + $client_id)
            ]
        );
        $comment = 'Подключение по адресу: '.$request->city.' '.$request->street.' '.$request->house.'/'.$request->porch.' '.$request->floor.'/'.$request->flatroom.
                   ' '.$request->count_room.' ком. <br>'.$request->famil.' '.$request->name.' '.$request->otch.'<br>'.$request->phone_one.' '.$request->phone_two.' '.
                   $request->phone_three.'<br>';
        $comment += $request->is_cable == 'on' ? 'свой кабель;' : '';
        $comment += $request->is_speedConnect == 'on' ? 'быстрое подключение;' : '';
        $comment += $request->is_contractHome == 'on' ? 'договор на дому;' : '';
        dd($comment);
        $request_id = DB::table('requests')->insertGetId(
            [
                'client_id'         => $client_id,
                'user_id'           => session('user_id'),
                'departament_id'    => 3,
                'category_id'       => 1,
                'title'             => 'Подключение по адресу: '.$request->city.' '.$request->street.' '.$request->house.'/'.$request->porch.' '.$request->floor.'/'.$request->flatroom,
                'comments'           => $comment,
                'status'            => 'новая'
            ]
        );
        DB::table('request_history')->insert(
            [
                'request_id'    => $request_id,
                'status'        => 'новая',
                'comment'       => 'открытие заявки'
            ]
        );
        DB::table('history')->insert(
            [
                'client_id' => $client_id,
                'tariff_id' => $request->tariff
            ]
        );
        if (isset($request->stocks))
        {
            if ($request->stocks != -1)
            {
                DB::table('history')->insert(
                    [
                        'client_id' => $client_id,
                        'stock_id'    => $request->stocks
                    ]
                );
            }
        }
        if (isset($request->services))
        {
            foreach ($request->services as $key => $serv)
            {
                if ($serv == 'on') DB::table('history')->insert(['client_id' => $client_id, 'service_id' => $key ]);
            }
        }
        DB::table('statistic')->insert(
            [
                'client_id'     => $client_id,
                'downloaded'    => 0,
                'last_update'   => date("Y-m-d H:i:s",time())
            ]
        );
        echo '<script>location.replace("/main");</script>'; exit;
    }
}
