<div class="table-responsive" style="padding: 0rem 1.5rem;">
    <table class="datatables-demo table table-striped table-bordered" id="data">
        <thead>
            <tr>
                <th>Статус</th>
                <th>Логин</th>
                <th>Ф.И.О.</th>
                <th>Место работы</th>
                <th>№ Телефона</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                    <tr class="user-row uid-{{ $user->id }} odd gradeX" data-toggle="modal" data-target="#modals-default" style="cursor: pointer;" 
                        OnClick="user_change({{ $user->id }}, '{{ $user->login }}', '{{ $user->famil }}'
                        , '{{ $user->name }}', '{{ $user->otch }}', '{{ $user->departament_id }}'
                        , '{{ $user->doljn }}', '{{ $user->aud_num }}', '{{ $user->tel_num }}'
                        , '{{ $user->role_id }}');">
                        @if ($userStatus[$user->id] == 'online' ) 
                            <td>
                                <span class="status-span">
                                    <div class="led-green"></div>
                                    <p class="status-p">В сети</p>
                                </span>
                                <p class="last-activ">{{$user->last_active}}</p>
                            </td>
                        @else 
                            <td>
                                <span class="status-span">
                                    <div class="led-red-on"></div>
                                    <p class="status-p">Не в сети</p>
                                </span>
                                <p class="last-activ">{{$user->last_active}}</p>
                            </td>
                        @endif
                        <td>{{ $user->login }}</td>
                        <td>{{ $user->famil }} {{ $user->name }} {{ $user->otch }}</td>
                        <td>{{ $user->departament_name }}</td>
                        <td>{{ $user->tel_num }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="{{ asset('js/tables_datatables.js') }}"></script>