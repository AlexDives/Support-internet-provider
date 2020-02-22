@extends('layer')

@section('menu')
    <ul class="sidenav-inner py-1">
        <li class="sidenav-item">
            <a href="/" class="sidenav-link"><i class="sidenav-icon ion ion-ios-home"></i>
                <div>Главная</div>
            </a>          
        </li>
        <li class="sidenav-item" active>
            <a href="#" class="sidenav-link"><i class="sidenav-icon ion ion-md-information-circle"></i>
                <div>Информация</div>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="#" class="sidenav-link"><i class="sidenav-icon ion ion-md-notifications-outline"></i>
                <div>Заявки</div>
            </a>
        </li>
        <li class="sidenav-item btn-b">
            <a href="#" class="sidenav-link"><i class="sidenav-icon ion ion-md-log-out"></i>
                <div>Выход</div>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">
        <a href="/" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
            <span class="app-brand-logo demo bg-primary">
                <svg viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path style="fill: #fff;" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
            </span>
            <span class="app-brand-text demo font-weight-normal ml-2">MENU</span>
        </a>
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
                      <input type="text" class="form-control navbar-text mx-2" placeholder="Найти..." style="width:200px">
                    </span>
                </label>
            </div>
            <div class="navbar-nav align-items-lg-center ml-auto">
                <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                    <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                        Логин
                    </a> 
                </div>
                <div class="demo-navbar-messages nav-item dropdown mr-lg-3">
                    <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                        Заявки
                    </a>                
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
            <div class="tab-pane fade show active" id="user-edit-account">
              <div class="card-body pb-2">
                <h4 class="font-weight-bold py-3 m-0"> Договор </h4>
                <div class="form-group row">
                  <label class="col-form-label col-sm-2 text-sm-right">Тип подключения:</label>
                  <div class="col-sm-3">
                    <select class="custom-select">
                      <option selected></option>
                      <option></option>
                      <option></option>
                      <option></option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-sm-2 text-sm-right">Тариф:</label>
                  <div class="col-sm-3">
                    <select class="custom-select">
                      <option selected></option>
                      <option></option>
                      <option></option>
                      <option></option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-sm-2 text-sm-right">Акция:</label>
                  <div class="col-sm-3">
                    <select class="custom-select">
                      <option selected></option>
                      <option></option>
                      <option></option>
                      <option></option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-sm-2 text-sm-right">Логин друга:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                </div>
                <hr class="border-light m-0">
                <h4 class="font-weight-bold py-3 m-0"> Паспортные данные </h4>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Ф. И. О.</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Серия:</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Номер:</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Дата выдачи:</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control mb-1" value="">
                  </div>
                </div>
                <hr class="border-light m-0"></h4>
                <h4 class="font-weight-bold py-3 m-0"> Адрес </h4>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Город</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Улица</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Дом:</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Подъезд:</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Этаж:</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                  <label class="col-form-label col-sm-1 text-sm-right">Квартира:</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                  <label class="col-form-label col-sm-2 text-sm-right">Количество комнат:</label>
                  <div class="col-sm-2">
                    <select class="custom-select">
                      <option selected>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-sm-1 text-sm-right">Телефон</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control mb-1" value="">
                  </div>                      
                  <div class="col-sm-2">
                    <input type="text" class="form-control mb-1" value="">
                  </div>                  
                  <div class="col-sm-2">
                    <input type="text" class="form-control mb-1" value="">
                  </div>
                </div>
              </div>
              <hr class="border-light m-0">
              <div class="table-responsive P-3">
              <div class="text-center m-3">
                <button type="button" class="btn btn-primary">Сохранить</button>
              </div>
              </div>
            </div>
            <div class="tab-pane fade" id="user-edit-info">
              <div class="card-body pb-2">
                <div class='row'>
                  <div class='col-md-12'>
                    <table class="table table-striped table-bordered dataTable no-footer">
                      <thead class="thead-light">
                        <tr class='text-center'>
                          <th>Дата</th>
                          <th>Кто</th>
                          <th>Категория</th> 
                          <th>Информация</th>                               
                        </tr>
                      </thead>
                      <tbody>
                        <tr class='text-center'>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr> 
                        <tr class='text-center'>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr> 
                        <tr class='text-center'>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr> 
                        <tr class='text-center'>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr> 
                        <tr class='text-center'>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr>                             
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class='row text-message mt-3'>
                  <div class='col-md-2'>
                    <div class="form-group p1 mb-1">
                      <select class="custom-select">
                        <option selected>Категория</option>
                        <option></option>
                        <option></option>
                        <option></option>
                      </select>
                    </div>
                  </div>
                  <div class='col-md-8 p1 mb-1'>
                    <input type="text" class="form-control" placeholder="Комментарий">
                  </div>
                  <div class='col-md-2'>
                      <div class="form-group mb-">
                        <button type="button" class="btn btn-sm btn-outline-primary">Отправить</button>
                      </div>
                  </div>
                </div>
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