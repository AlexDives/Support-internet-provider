<table class="table card-table stat-table">
    <thead class="thead-light">
      <tr class='text-center'>
        <th>Дата</th>
        <th>Услуга</th>
        <th>Стоимость</th> 
        <th>Статус</th> 
      </tr>
    </thead>
    <tbody>
        @foreach ($list as $l)
            <tr class='text-center'>
                <td>@IF(isset($l->date_deactivation)) {{ date('d.m.Y H:i:s', strtotime($l->date_deactivation)) }} @else {{ date('d.m.Y H:i:s', strtotime($l->date_activation)) }} @endif</td>
                @IF(isset($l->tariff_id))
                    <td>Тариф {{ $l->tname }}</td>
                    <td>-{{ $l->tcost}} руб.</td>
                @elseif(isset($l->stock_id))
                    <td>Акция: {{ $l->stname }}</td>
                    <td>@IF(isset($l->date_deactivation)) 0 @else {{ $l->stcost}} @endif руб.</td>
                @elseif(isset($l->service_id))
                    <td>{{ $l->sname }}</td>
                    <td>@IF(isset($l->date_deactivation)) 0 @else -{{ $l->scost}} @endif руб.</td>
                @endif
                <td>@IF(isset($l->date_deactivation)) Деактивирован @else Активирован @endif</td> 
            </tr>  
        @endforeach
    </tbody>
</table>