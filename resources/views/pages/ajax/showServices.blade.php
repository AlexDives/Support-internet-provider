@foreach ($services as $serv)
    <div class="form-group row">
        <label class="col-form-label  col-sm-2 text-sm-right">{{$serv->name}}:</label>
        <div class="col-sm-1">
            <input onclick="editServices({{$serv->id}});" type="checkbox" class="form-control mb-1" style="width:20px;" {{$arr[$serv->id]}} >
       </div>
    </div>
@endforeach