<table class="datatables-demo table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Статус</th>
            <th>Дата</th>
            <th>Категория</th>
            <th>Заголовок</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $req)
            <tr class="odd gradeX">
                <td>{{ $req->id }}</td>
                <td>{{ $req->status }}</td>
                <td>{{ date('d.m.Y', strtotime($req->date_crt)) }}</td>
                <td class="center">{{ $req->category_name }}</td>
                <td class="center">{{ $req->title }}</td>
            </tr>    
        @endforeach                 
    </tbody>
</table>