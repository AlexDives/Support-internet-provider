@extends('layer')

@section('menu')
    <ul class="sidenav-inner py-1">
        <li class="sidenav-item">
            <a href="#" class="sidenav-link" onclick="newUser();"><i class="sidenav-icon ion ion-md-person-add"></i>
                <div>Новый</div>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="#" class="sidenav-link" onclick="saveUser();"><i class="sidenav-icon ion ion-md-save"></i>
                <div>Сохранить</div>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="#" class="sidenav-link" onclick="deleteUser();"><i class="sidenav-icon ion ion-md-trash"></i>
                <div>Удалить</div>
            </a>
        </li>
        
        <li class="sidenav-item btn-b">
            <a href="/main" class="sidenav-link"><i class="sidenav-icon ion ion-md-arrow-round-back"></i>
                <div>Назад</div>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class='row'>
            <div class='col-md-12 mb-5'>
                <div class="card">
                    <h6 class="card-header"> Список пользователей </h6>
                    <div class="card-datatable table-responsive">
                        <div class="mainInfoUser-a" name="userTable" id="userTable"></div>
                    </div>
                </div>
            </div>
            <div class='col-md-12 mb-5'>
                <div class="card">
                    <div class='card-datatable table-responsive' name="mainInfoUser">
                        <form action="" method="POST" id="userform" style="overflow: hidden; padding: 1.5rem 1.5rem;">
                            {{ csrf_field() }}
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Логин</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control mb-1" name="login" placeholder="" id="login">
                                        </div>
                                        <input type="hidden" id="uid" name="uid" value="0">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Пароль</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control mb-1" name="password" placeholder="" id="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Повторить пароль</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control mb-1" name="password_two" placeholder="" id="password_two">
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Фамилия</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control mb-1" name="famil" placeholder="" id="famil">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Имя</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control mb-1" name="name" placeholder="" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Отчество</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control mb-1" name="otch" placeholder="" id="otch">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <HR>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Отдел:</label>
                                        <div class="col-sm-9">
                                            <select name="departaments" class="custom-select" id="departaments">
                                                @foreach ($departaments as $departament)
                                                    <option value="{{ $departament->id }}">{{ $departament->name }}</option>
                                                @endforeach	                             
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Должность</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="doljn" placeholder="" id="doljn">
                                        </div> 
                                    </div> 
                                </div>
                                <div class='col-md-6'>				 										 
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">№ Кабинета</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="aud_num" placeholder="" id="aud_num">
                                        </div> 
                                    </div> 				 										 
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">№ Телефона</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tel_num" placeholder="" id="tel_num">
                                        </div> 
                                    </div> 
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Роль:</label>
                                        <div class="col-sm-9">
                                            <select name="roles" class="custom-select" id="roles">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach	                             
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
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
    <script src="{{ asset('js/custom/workers.js') }}"></script>
@endsection

@section('jsEnd')
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/sidenav.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    
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
    <link rel="stylesheet" href="{{ asset('css/custom/workers.css') }}">
@endsection