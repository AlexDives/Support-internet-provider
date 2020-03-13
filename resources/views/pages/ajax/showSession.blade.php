<table class="table card-table stat-table">
    <thead class="thead-light">
      <tr class='text-center'>
        <th>Время подключения</th>
        <th>Последнее обновление</th>
        <th>Логин</th> 
        <th>Session id</th>  
        <th>Статус / сброс</th> 
      </tr>
    </thead>
    <tbody>
        @foreach ($list as $l)
            <tr class='text-center'>
                <td>{{ date('d.m.Y H:i:s', strtotime($l->date_crt)) }}</td>
                <td>{{ date('d.m.Y H:i:s', strtotime($l->date_update)) }}</td>
                <td>{{ $l->login_internet }}</td>
                <td>{{ $l->sessions_id }}</td>
                <td>@IF($l->status == 'false') Закрыта @else <button class='btn btn-outline-danger btn-sm' onclick="closeSession({{$l->id}});">сброс</button> @endif</td> 
            </tr>  
        @endforeach
    </tbody>
</table>