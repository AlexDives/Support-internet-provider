@extends('layer')

@section('menu')
    <ul class="sidenav-inner py-1">
      <li class="sidenav-item active">
          <a href="/main" class="sidenav-link"><i class="sidenav-icon ion ion-ios-home"></i>
              <div>Главная</div>
          </a>          
      </li>
      <li class="sidenav-item">
          <a href="/info" class="sidenav-link"><i class="sidenav-icon ion ion-md-information-circle"></i>
              <div>Информация</div>
          </a>
      </li>
      <li class="sidenav-item">
          <a href="/request" class="sidenav-link"><i class="sidenav-icon ion ion-md-notifications-outline"></i>
              <div>Заявки</div>
          </a>
      </li>
        @if ($role_id == 1)
            <li class="sidenav-item">
            <a href="/workers" class="sidenav-link"><i class="sidenav-icon ion ion-md-people"></i>
                <div>Сотрудники</div>
            </a>
        </li>
      @endif
      <li class="sidenav-item btn-b">
          <a href="/quit" class="sidenav-link"><i class="sidenav-icon ion ion-md-log-out"></i>
              <div>Выход</div>
          </a>
      </li>
    </ul>
@endsection

@section('content')
    <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">
        <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
            <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:void(0)">
                <i class="ion ion-md-menu text-large align-middle"></i>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--<div class="navbar-collapse collapse" id="layout-navbar-collapse">
            <hr class="d-lg-none w-100 my-2">
            <div class="navbar-nav align-items-lg-center">
                <label class="nav-item navbar-text navbar-search-box p-0 active">
                    <i class="ion ion-ios-search navbar-icon align-middle"></i>
                    <span class="navbar-search-input pl-2">
                      <input type="text" class="form-control navbar-text mx-2" placeholder="Найти..." style="width:350px">
                    </span>
                </label>
                <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                    <select class="custom-select" href="#" data-toggle="dropdown">
                        <option value="1" >Логин</option>
                        <option value="2" >Заявки</option>
                    </select> 
                </div>
                <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
                <div class="demo-navbar-user nav-item dropdown">
                    <a class="nav-link" href="#">
                        <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle"> 
                            <span class="px-1 mr-lg-2 ml-2 ml-lg-0">Поиск</span>
                        </span>
                    </a> 
                </div>
            </div>
        </div>-->
    </nav>
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class='row'>
            <div class='col-md-12 mb-5'>
                <div class="card">
                    <h6 class="card-header"> База заявок </h6>
                    <div class="card-datatable table-responsive" name="list_requests" id ="list_requests">
                    </div>
                </div>
            </div>
            <div class='col-md-12 mb-5'>
                <div class="card">
                    <h6 class="card-header"> База пользователей </h6>
                    <div class="card-datatable table-responsive" name="list_users" id="list_users">
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modals-default" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg" style="max-width: 55rem !important;">
                  <div class="modal-content">
                    <div class='modal-h'>
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" id="tab_main" data-toggle="tab" href="#navs-top-home">Общая</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#navs-top-stats">Статистика пополнений</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#navs-top-ping">Ping</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#navs-top-messages">Комментарии</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#navs-top-session">Сессии</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#navs-top-service">Услуги</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#navs-top-history">История</a>
                          </li>
                        </ul>                        
                        <button type="button" onclick="sPing.abort();" class="close" data-dismiss="modal" aria-label="Close">×</button>
                      </div>
                    <div class="modal-body" id="loadClientInfo">
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection

@section('jsStart')
    <script src="{{ asset('js/polyfills.js') }}"></script>
    <script>
        document['documentMode']===10&&document.write('<script src="https://polyfill.io/v3/polyfill.min.js?features=Intl.~locale.en"><\/script>')
    </script>
    <script src="{{ asset('js/material-ripple.js') }}"></script>
    <script src="{{ asset('js/layout-helpers.js') }}"></script>
    <script src="{{ asset('js/pace.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/custom/ping.js') }}"></script>
    <script>
        function loadClients() {
            $.ajax({
            url: '/loadClients',
            type: 'GET',
            success: function(html) {
              $('#list_users').html(html);
            }
          });
        }
        function editClientInfo() {
          var famil = $('#famil').val();
          var name = $('#name').val();
          var otch = $('#otch').val();
          var city = $('#address_city').val();
          var street = $('#address_street').val();
          var house = $('#address_house').val();
          var porch = $('#address_porch').val();
          var floor = $('#address_floor').val();
          var flatroom = $('#address_flatroom').val();
          var phoneOne = $('#phoneOne').val();
          var phoneTwo = $('#phoneTwo').val();
          var phoneThree = $('#phoneThree').val();
          var cid = $('#cid').val();

            $.ajax({
            url: '/editClientInfo',
            type: 'post',
            headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              famil : famil, 
              name : name, 
              otch : otch, 
              city : city, 
              street : street, 
              house : house, 
              porch : porch, 
              floor : floor, 
              flatroom : flatroom, 
              phoneOne : phoneOne, 
              phoneTwo : phoneTwo, 
              phoneThree : phoneThree,
              cid : cid
            },
            success: function(data)
            {
              loadClients();
            }
          });
        }
        function editInternet(internet) {
          var cid = $('#cid').val();
          $.ajax({
            url: '/editInternet',
            type: 'post',
            headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              internet : internet,
              cid : cid
            },
            success: function(data) {
              if (data == 'T') $('#enable_internet').html('Выключить');
              else if (data == 'F') $('#enable_internet').html('Включить');
              $('#enable_internet').attr('onclick', 'editInternet("'+data+'");');
              loadClients();
            }
          });
        }
        function payStatistic() {
          var cid = $('#cid').val();
          var year = $('#year').val();
          var month =$('#month').val();
          $.ajax({
            url: '/payStatistic',
            type: 'post',
            headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              year : year,
              month : month,
              cid : cid
            },
            success: function(data) {
              $('#pstats').html(data);
            }
          });
        }
        function showMessages() {
          var cid = $('#cid').val();
          $.ajax({
            url: '/showMessages',
            type: 'post',
            headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              cid : cid
            },
            success: function(data) {
              $('#showMessage').html(data);
            }
          });
        }
        function showHistory() {
          var cid = $('#cid').val();
          $.ajax({
            url: '/showHistory',
            type: 'post',
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              cid : cid
            },
            success: function(data) {
              $('#showHistory').html(data);
            }
          });
        }
        function showServices() {
          var cid = $('#cid').val();
          $.ajax({
            url: '/showServices',
            type: 'post',
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              cid : cid
            },
            success: function(data) {
              $('#showServices').html(data);
            }
          });
        }
        function editServices(sid) {
          var cid = $('#cid').val();
          $.ajax({
            url: '/editServices',
            type: 'post',
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              sid : sid,
              cid : cid
            },
            success: function(data) {
              showServices();
            }
          });
        }
        function sendMessages() {
          var cid = $('#cid').val();
          var comment = $('#comment').val();
          $('#comment').val('');
          $.ajax({
            url: '/sendMessages',
            type: 'post',
            headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              comment : comment,
              cid : cid
            },
            success: function(data) {
              showMessages();
            }
          });
        }
        function showSession() {
          var cid = $('#cid').val();
          var date_start = $('#start_date').val();
          var date_end = $('#end_date').val();
          $('#comment').val('');
          $.ajax({
            url: '/showSession',
            type: 'post',
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              date_start : date_start,
              date_end : date_end,
              cid : cid
            },
            success: function(data) {
              $('#showSessions').html(data);
            }
          });
        }
        function closeSession(sid) {
          $.ajax({
            url: '/closeSession',
            type: 'post',
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              sid : sid
            },
            success: function(data) {
              showSession();
            }
          });
        }
        function editPass(type) {
          var cid = $('#cid').val();
          var pass = type == 'stats' ? $("#stat_pass").val() : $("#inet_pass").val();
          $.ajax({
            url: '/editPass',
            type: 'post',
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              type : type,
              pass : pass,
              cid : cid
            },
            success: function(data) {
              $("#stat_pass").val('');
              $("#inet_pass").val('');
            }
          });
        }
        function editIpMac() {
          var cid = $('#cid').val();
          var ip = $("#ip_address").val();
          var mac = $("#mac_address").val();
          $.ajax({
            url: '/editIpMac',
            type: 'post',
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              ip : ip,
              mac : mac,
              cid : cid
            },
            success: function(data) {
              if (data == -1) alert('Данный ip уже занят!');
              else if (data == -2) alert('Данный MAC уже занят!');
            }
          });
        }
        function loadClientInfo(client_id) {
            $.ajax({
            url: '/loadClientInfo',
            type: 'post',
            data: {client_id : client_id},
            headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(html) {
              $('#loadClientInfo').html(html);
              $('#tab_main').click();
              showMessages();
              showHistory();
              showServices();  
              showPing();           
            }
          });
        }
        function loadRequests() {
          $.ajax({
            url: '/loadRequests',
            type: 'GET',
            success: function(html) {
              $('#list_requests').html(html);
            }
          });
        }
        var sPing;
        
        function showPing() {
          var cid = $('#cid').val();
          sPing = $.ajax({
            url: '/showPing',
            type: 'POST',
            data: {
              cid : cid
            },
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(html) {
              $('#showPing').html(html);
              $('#preLoaderPing').hide();
              $('#showPing').show();
            }
          });
        }
        loadRequests();
        loadClients();
      </script>
@endsection

@section('jsEnd')
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/sidenav.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/tables_datatables.js') }}"></script>
@endsection

@section('css')
    <title>Главная</title>
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/open-iconic.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" class="theme-settings-bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/appwork.css') }}" class="theme-settings-appwork-css">
    <link rel="stylesheet" href="{{ asset('css/theme-corporate.css') }}" class="theme-settings-theme-css">
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}" class="theme-settings-colors-css">
    <link rel="stylesheet" href="{{ asset('css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/preloader-style.css') }}">
    <style>
      .btn-b {
        position: absolute; 
        bottom:10px;
      }
      table { font-size: 13px; }
      .modal-content .close {
        position: absolute;
        right: 20px;
        top: 10px;
      }
      .modal-h {
        border-bottom: 1px solid #ccc;
      }
      .p1 p {
        margin: 0px;
      }
      .p1 input {
        height: 28px;
      }
      .p1 select {
        height: 28px;
        padding: 0px 5px;
      }
      .zt p {
        margin-top: 5px;
      }
      .p1 .comment-m {
        margin-top: 5px;
      }
      .message-c {
        width: 100%;
      }
      .message-d {
        float:left;
        width:20%;
      } 
      .message-w {
        min-height: 300px;
      }
      .stat-table {
        margin-top: 20px;
        border: 1px solid #eee !important;
      }
      .stat-table thead th {
        text-align: center;
      }  
      .ping-w p {
        margin: 0px;
      }
      .ping-w div {
        margin-left: 20px;
      }
      .ping-h h5 {
        margin: 0px;
      }
      .ping-c .form-group {
        margin: 8px;
      }
      .client-input {
        height: 21px !important;
        border: none;
        cursor: pointer;
      }
      .client-input-flex {
        display: flex;
        flex-flow: column;
      }
    </style>
@endsection