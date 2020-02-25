@extends('layer')

@section('menu')
    <ul class="sidenav-inner py-1">
        <li class="sidenav-item">
            <a href="/main" class="sidenav-link"><i class="sidenav-icon ion ion-ios-home"></i>
                <div>Главная</div>
            </a>          
        </li>
        <li class="sidenav-item active">
            <a href="#" class="sidenav-link"><i class="sidenav-icon ion ion-md-information-circle"></i>
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
    </nav>
    <div class="layout-content">
      <div class="container-fluid flex-grow-1 container-p-y">
        <div class="nav-tabs-top">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#user-edit-account">Новый договор</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#user-edit-info">Профилактические работы</a>
            </li>
          </ul>
          <div class="tab-content">
            <form action="/newOffer" method="POST" class="tab-pane fade show active" id="user-edit-account">
              {{ csrf_field() }}
              <div class="card-body pb-2">
                <h4 class="font-weight-bold py-3 m-0"> Договор </h4>
                <div class="form-group row">
                  <div class="col-md-4">
                    <div class="form-group row">
                      <label class="col-form-label col-sm-2 text-sm-right">Тариф:</label>
                      <div class="col-sm-10">
                        <select class="custom-select" id="tariff" name="tariff">
                          <option value="-1"></option>
                          @foreach ($tariffs as $tariff)
                            <option value="{{$tariff->id}}">{{$tariff->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-sm-2 text-sm-right">Акция:</label>
                      <div class="col-sm-10">
                        <select class="custom-select" id="stocks" name="stocks">
                          <option value="-1"></option>
                          @foreach ($stocks as $stock)
                            <option value="{{$stock->id}}">{{$stock->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-sm-2 text-sm-right">Логин друга:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control mb-1" value="" id="login_refer" name="login_refer">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    @foreach ($services as $service)
                      <div class="form-group row">
                        <label class="col-form-label  col-sm-2 text-sm-right">{{$service->name}}:</label>
                        <div class="col-sm-1">
                          <input type="checkbox" class="form-control mb-1" id="services[{{$service->id}}]" name="services[{{$service->id}}]">
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
                
                <hr class="border-light m-0">
                <h4 class="font-weight-bold py-3 m-0"> Паспортные данные </h4>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Фамилия</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control mb-1" value="" id="famil" name="famil">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Пол:</label>
                  <div class="col-sm-1">
                    <select class="custom-select" id="gender" name="gender">
                      <option value="-1"></option>
                      <option value="М">Мужской</option>
                      <option value="Ж">Женский</option>
                    </select>
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Дата рождения:</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control mb-1" value="" id="birthday" name="birthday">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Имя</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control mb-1" value="" id="name" name="name">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Серия:</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control mb-1" value="" id="pasp_ser" name="pasp_ser">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Номер:</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control mb-1" value="" id="pasp_num" name="pasp_num">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Дата выдачи:</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control mb-1" value="" id="pasp_date" name="pasp_date">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Отчество</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control mb-1" value="" id="otch" name="otch">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Кем выдан:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control mb-1" value="" id="pasp_issue" name="pasp_issue">
                  </div>
                </div>
                <hr class="border-light m-0"></h4>
                <h4 class="font-weight-bold py-3 m-0"> Адрес </h4>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Город</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control mb-1" value="" id="city" name="city">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Улица</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control mb-1" value="" id="street" name="street">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Дом:</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control mb-1" value="" id="house" name="house">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Подъезд:</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control mb-1" value="" id="porch" name="porch">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Этаж:</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control mb-1" value="" id="floor" name="floor">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Квартира:</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control mb-1" value="" id="flatroom" name="flatroom">
                  </div>
                  <label class="col-form-label col-sm-2 text-sm-right">Количество комнат:</label>
                  <div class="col-sm-2">
                    <select class="custom-select" id="count_room" name="count_room">
                      <option selected>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Телефон</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control mb-1" value="" id="phone_one" name="phone_one">
                  </div>                      
                  <div class="col-sm-2">
                    <input type="text" class="form-control mb-1" value="" id="phone_two" name="phone_two">
                  </div>                  
                  <div class="col-sm-2">
                    <input type="text" class="form-control mb-1" value="" id="phone_three" name="phone_three">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label">Свой кабель:</label>
                  <div class="col-sm-1">
                    <input type="checkbox" class="form-control mb-1" value="" id="is_cable" name="is_cable">
                  </div>
                  <label class="col-form-label">Быстрое подключение:</label>                      
                  <div class="col-sm-1">
                    <input type="checkbox" class="form-control mb-1" value="" id="is_speedConnect" name="is_speedConnect">
                  </div>   
                  <label class="col-form-label">Договор на дому:</label>               
                  <div class="col-sm-1">
                    <input type="checkbox" class="form-control mb-1" value="" id="is_contractHome" name="is_contractHome">
                  </div>
                </div>
              </div>
              <hr class="border-light m-0">
              <div class="table-responsive P-3">
              <div class="text-center m-3">
                <button type="submit" class="btn btn-primary">Сохранить</button>
              </div>
              </div>
            </form>
            <div class="tab-pane fade" id="user-edit-info">
              <div class="card-body pb-2">
                <div class='row'>
                  <div class='col-md-12' id="table_information">
                  </div>
                </div>
                <form action="" method="post" class="row text-message mt-3" id="info_form" name="info_form">
                  {{ csrf_field() }}
                  <div class='col-md-10 p1 mb-1'>
                    <input type="text" class="form-control" placeholder="Комментарий" id="i_comment" name="i_comment">
                  </div>
                  <div class='col-md-2'>
                      <div class="form-group mb-">
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="saveInfo();">Отправить</button>
                      </div>
                  </div>
                </form>
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
    <script>
      function saveInfo() {
        if ($('#i_comment').val() != '') 
        {
          $.ajax({
            url: '/saveInformation',
            type: 'POST',
            data: $('#info_form').serialize(),
            success: function(html) {
              loadInfo();
              $('#i_comment').val('');
            }
          });
        }
        else alert('Напишите комментарий!');
      }
      function loadInfo() {
        $.ajax({
          url: '/tableInformation',
          type: 'GET',
          success: function(html) {
            $('#table_information').html(html);
          }
        });
      }
      loadInfo();
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
    <title>Информация</title>
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
        z-index: 9999;
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
      .mh400 { min-height: 400px; }
    </style>
@endsection