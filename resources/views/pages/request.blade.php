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
			<li class="sidenav-item">
				<a href="/request/new" class="sidenav-link">
				<div>Новая заявка</div>
				</a>
			</li>
			<li class="sidenav-item active">
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
				<div class="card">
					<h6 class="card-header"> База заявок </h6>
					<div class="card-datatable table-responsive" style='padding-top: 0px;' id="list_requests">

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
	  </script>
@endsection

@section('jsEnd')
	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	<script src="{{ asset('js/sidenav.js') }}"></script>
	<script src="{{ asset('js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('js/datatables.js') }}"></script>
	<script src="{{ asset('js/demo.js') }}"></script>
	<script>
        $(function() {
            $('#request_table').dataTable(
				{
					"order": [[ 0, "desc" ]]
				}
			);
        });
    </script>
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