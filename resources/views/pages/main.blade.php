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
          <a href="#" class="sidenav-link"><i class="sidenav-icon ion ion-md-notifications-outline"></i>
              <div>Заявки</div>
          </a>
      </li>
        @if ($role_id == 1)
            <li class="sidenav-item">
            <a href="/workers" class="sidenav-link"><i class="sidenav-icon ion ion-md-headset"></i>
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
        <div class="navbar-collapse collapse" id="layout-navbar-collapse">
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
        </div>
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
            @include('pages.ajax.userInfo')
            <div class='col-md-12'>
                <div class="card">
                    @include('pages.ajax.userPing')
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
        function loadRequests() {
          $.ajax({
            url: '/loadRequests',
            type: 'GET',
            success: function(html) {
              $('#list_requests').html(html);
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
        width:100px;
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
    </style>
@endsection