<table class="table table-striped table-bordered dataTable no-footer">
    <thead class="thead-light">
      <tr class='text-center'>
        <th style="width: 60px">Дата</th>
        <th>Отдел</th>
        <th style="width: 150px">Кто</th>
        <th>Информация</th>                               
      </tr>
    </thead>
    <tbody>
        @foreach ($informations as $info)
            <tr class='text-center'>
                <td>{{ date('d.m.Y H:m:s', strtotime($info->date_crt)) }}</td>
                <td>{{ $info->dep_name }}</td>
                <td>{{ $info->famil }} {{ $info->name }} {{ $info->otch }}</td>
                <td>{{ $info->info_text }}</td>
            </tr> 
        @endforeach                       
    </tbody>
  </table>