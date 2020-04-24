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
		<li class="sidenav-item open active">
			<a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-notifications-outline"></i>
			<div>Заявки</div>
			</a>

			<ul class="sidenav-menu">
                <li class="sidenav-item active">
                    <a href="/request/new" class="sidenav-link">
                    <div>Новая заявка</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/request" class="sidenav-link">
                    <div>Список заявок</div>
                    </a>
                </li>
			</ul>
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
	</nav>
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class='row'>
            <div class='col-md-12 mb-5'>
                <div class="card p-3">
                    <form method="POST" action="/request/save" class='row'>
                        {{ csrf_field() }}
                        <div class='col-md-3'>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-12 text-sm-left">Категория:</label>
                                <div class="col-sm-12">
                                    <select class="custom-select" id="category" name="category" required>
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->id }}" {{ isset($request) ? $request->category_id == $cat->id ? 'selected' : '' : $loop->iteration == 1 ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-12 text-sm-left">Отдел:</label>
                                <div class="col-sm-12">
                                    <select class="custom-select" id="departament" name="departament" required>
                                        @foreach($departaments as $dep)
                                            <option value="{{ $dep->id }}" {{ isset($request) ? $request->departament_id == $dep->id ? 'selected' : '' : $loop->iteration == 1 ? 'selected' : '' }}>{{ $dep->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-1'></div>
                        <div class='col-md-2'>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-12 text-sm-left">Статус:</label>
                                <div class="col-sm-12">
                                    <select class="custom-select" id="status" name="status" required>
                                        <option value="Новая" {{ isset($request) ? $request->status =='Новая' ? 'selected' : '' : 'selected' }}>Новая</option>
                                        <option value="Открыта" {{ isset($request) ? $request->status =='Открыта' ? 'selected' : '' : '' }}>Открыта</option>
                                        <option value="Закрыта" {{ isset($request) ? $request->status =='Закрыта' ? 'selected' : '' : '' }}>Закрыта</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-12 text-sm-left">Тема:</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control mb-1" id="theme" name="theme" value="{{ isset($request) ? $request->title : '' }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-12 text-sm-left">Описание:</label>
                                <div class="col-sm-12">
                                    <textarea class='form-control' style='min-height: 300px' id="comment" name="comment" required>{{ isset($request) ? $request->comments : '' }}</textarea>
                                </div>
                            </div>                                    
                        </div>
                    </div>  
                    <div class="table-responsive P-3">
                        <div class="text-center m-3">
                            <input type="hidden" name="rid" id="rid" value="{{ isset($request) ? $request->id : '' }}">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>
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
      </style>
@endsection