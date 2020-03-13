<div class='row message-w'>
    <div class='col-md-12'>
        @foreach ($list as $l)
            <div class='message-c'>
                <div class='message-d'>
                    <b>{{date('d.m.Y', strtotime($l->date_crt))}} - {{ $l->login }}: </b>
                </div>
                <div class='message-t'>
                    {{$l->comment}}
                </div>
            </div>
        @endforeach
    </div>
</div>