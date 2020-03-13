<table class="datatables-demo table table-striped table-bordered">
    <thead>
      <tr>
        <th>Логин</th>
        <th>Ф.И.О</th>
        <th>Блокировка</th>
        <th>Баланс</th>
        <th>Интернет</th>
        <th>Дата снятия</th>
        <th>IP адрес</th>
        <th>Адрес</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($clients as $client)
        <tr class="odd gradeX" data-toggle="modal" data-target="#modals-default" style='cursor: pointer;' onclick="loadClientInfo({{$client->id}});">
          <td>{{ $client->lic_schet }}</td>
          <td>{{ $client->fio }}</td>
          @if ( $client->is_block == 'F')
            <td>Активен</td>
          @else
            <td style="color:tomato;">Заблокирован</td>
          @endif
          <td class="center">{{ $client->balance }}</td>
          <td class="center">@if($client->enable_internet == 'T') Подключен @else Отключен @endif</td>
          <td class="center">{{ date('d.m.Y', strtotime($client->date_payments)) }}</td>
          <td class="center">{{ $client->ip_address }}</td>
          <td class="center">{{ $client->address }}</td>
        </tr> 
      @endforeach
    </tbody>
  </table>