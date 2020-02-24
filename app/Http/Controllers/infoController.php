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
        return view('pages.info', ['tariffs' => $tariffs, 'stocks' => $stocks]);
    }

    public function loadTariff()
    {
        return DB::table('tariff')->get();
    }

    public function loadStocks()
    {
        return DB::table('stocks')->get();
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
                'is_cable'          => $request->is_cable ? 'T' : 'F',
                'is_speedConnect'   => $request->is_speedConnect ? 'T' : 'F',
                'is_contractHome'   => $request->is_contractHome ? 'T' : 'F'
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
        echo '<script>location.replace("/main");</script>'; exit;
    }
}
