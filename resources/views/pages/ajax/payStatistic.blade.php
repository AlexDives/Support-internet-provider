<table class="table card-table stat-table">
    <thead class="thead-light">
      <tr>
        <th>Дата пополнения</th>
        <th>Сумма</th>
        <th>Комментарий</th> 
      </tr>
    </thead>
    <tbody>
        @foreach ($list as $l)
            <tr>
                <td>{{date('d.m.Y H:i:s', strtotime($l->date_pay))}}</td>
                <td>{{$l->bill}} руб.</td>
                <td>{{$l->comment}}</td> 
            </tr>
        @endforeach
    </tbody>
  </table>