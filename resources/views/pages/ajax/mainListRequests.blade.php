<table class="datatables-demo table table-striped table-bordered" id="request_table">
    <thead>
        <tr>
            <th>№</th>
            <th>Дата</th>
            <th>Статус</th>
            <th>Категория</th>
            <th>Отдел</th>
            <th>Тема</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $req)
            <tr class="odd gradeX" style='cursor: pointer;' onclick="document.location.href = '/request/open?rid={{ $req->id }}';">
                <td>{{ $req->id }}</td>
                <td>{{ date('d.m.Y H:i:s', strtotime($req->date_crt)) }}</td>
                <td>{{ $req->status }}</td>
                <td class="center">{{ $req->category_name }}</td>
                <td class="center">{{ $req->otdel }}</td>
                <td class="center">{{ $req->title }}</td>
            </tr>    
        @endforeach     
    </tbody>
</table>