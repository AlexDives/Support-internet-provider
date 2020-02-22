<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta http-equiv="Cache-Control" content="max-age=300, must-revalidate">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="{{ asset('images/favicon.ico') }}" rel="icon" type="image/x-icon"/>
		<link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
		<link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/custom/index.css" />
		<title>Support</title>
    	<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script>
			function auth_check() {
				if ($("#login").val() == "" && $("#pwd").val() == "") $(".error-message").text("Заполните все поля!");
				else { 
					$.ajax({
						url: '{{ url("/auth") }}',
						type: 'POST',
						data: $('#AuthForm').serialize(),
						headers: {
							'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
						},
						success: function (data) {
							if (data == -2) $(".error-message").text("Неверный логин или пароль!");
							else if (data == -1) $(".error-message").text("Данный пользователь ЗАБЛОКИРОВАН!");
							else if (data == -3) $(".error-message").text("Данный пользователь не найден!");
							else {
								check_role(data['role_id']);
							}
						},
						error: function (msg) {
							alert('Ошибка');
						}
					});
				}
			}
			/* проверка роли и доступ к определенным элементам */
			function check_role (role_id)
			{
				if (role_id > 0) {
					location.replace("/main");
				}
			}
			function onkeyup_check(e) { if (e.which == 13) auth_check(); }
		</script>
	</head>
	<body>
		<div class="wrap">
			<div class="auth-block" id="auth-block">
				<figure class="auth-block-front">
					<div class="auth-block-header">
						<h3>Авторизация</h3>
					</div>
					<div class="auth-form-block">
						<form method="POST" action="" name="AuthForm" id="AuthForm">
							{{ csrf_field() }}
							<input type="hidden" name="rid" id="rid" value="{{ $idRole }} "> 
							<input type="text" name="login" id="login" placeholder="Логин" value="" readonly onfocus="this.removeAttribute('readonly')" required/>
							<input type="password" name="pwd" id="pwd" placeholder="Пароль" value="" onfocus="this.removeAttribute('readonly')" onkeyup="onkeyup_check(event)" required/>
							<input type="button" name="ButtonFormAuth" value="Войти" class="ButtonFormAuth" id="ButtonFormAuth" onClick="auth_check()"/>
						</form>
						<div class="error-message" name="error-message" id="error-message"></div>
					</div>
				</figure>
			</div>
		</div>
		<script>
			if ($("#rid").val() > 0) check_role($("#rid").val());
		</script>
	</body>
</html>