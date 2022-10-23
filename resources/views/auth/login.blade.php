<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" href="{{ asset('assets') }}/media/logos/favicon.ico" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{ asset('assets') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<style>body { background-image: url('{{ asset('assets') }}/media/auth/bg4.jpg'); } [data-theme="dark"] body { background-image: url('/meassetsdemo1/media/auth/bg4-dark.jpg'); }</style>
	</head>
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<div class="d-flex flex-center flex-lg-start flex-column">
						<a href="{{ route('view.login') }}" class="mb-7">
							<h1 style="color: white">TEST KEMAMPUAN BIDANG</h1>
						</a>
					</div>
				</div>
				<div class="d-flex flex-center w-lg-50 p-10">
					<div class="card rounded-3 w-md-550px">
						<div class="card-body p-10 p-lg-20">
							@if ($message = Session::get('danger'))
								<div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@endif
							<form class="form w-100" action="{{ route('action.login') }}" novalidate="novalidate" id="kt_sign_in_form" method="POST">
								@csrf
								<div class="text-center mb-11">
									<h1 class="text-dark fw-bolder mb-3">Masuk</h1>
								</div>
								<div class="fv-row mb-8">
									<input type="text" placeholder="Email / Username" name="username" autocomplete="off" class="form-control bg-transparent" />
								</div>
								<div class="fv-row mb-3">
									<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
								</div>
								<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
									<div></div>
									<a href="#" class="link-primary">Lupa Password ?</a>
								</div>
								<div class="d-grid mb-10">
									<button type="submit" class="btn btn-primary">
										Masuk
									</button>
								</div>
								<div class="text-gray-500 text-center fw-semibold fs-6">Belum mendaftar? 
								<a href="{{ URL::to('register') }}" class="link-primary">Registrasi</a></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
		<script src="{{ asset('assets') }}/js/custom/authentication/sign-in/general.js"></script>
	</body>
</html>