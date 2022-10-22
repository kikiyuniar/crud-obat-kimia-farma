<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Register</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{ asset('assets') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
	</head>
	<body style="background-image: url('{{ asset('assets') }}/media/auth/bg4.jpg');background-size: auto;" id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
							<form class="form w-100" action="{{ route('action.register') }}" method="POST" novalidate="novalidate" id="kt_sign_up_form">
								@csrf
								<div class="text-center mb-11">
									<h1 class="text-dark fw-bolder mb-3">Registrasi</h1>
									<div class="text-gray-500 fw-semibold fs-6">Masukkan data yang valid</div>
								</div>
                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="Nama" name="name" autocomplete="off" class="form-control bg-transparent" autofocus value="{{ old('name') }}"/>
                                </div>
								<div class="fv-row mb-8">
									<input type="text" placeholder="Username" name="username" id="username" style="text-transform: lowercase;" value="{{ old('username') }}" autocomplete="off" class="form-control bg-transparent" />
								</div>
								<div class="fv-row mb-8">
									<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" value="{{ old('email') }}"/>
								</div>
								<div class="fv-row mb-8" data-kt-password-meter="true">
									<div class="mb-1">
										<div class="position-relative mb-3">
											<input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" />
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="bi bi-eye-slash fs-2"></i>
												<i class="bi bi-eye fs-2 d-none"></i>
											</span>
										</div>
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
									</div>
									<div class="text-muted">Gunakan 8 karakter atau lebih dengan campuran huruf besar, kecil, simbol, dan angka.</div>
								</div>
								<div class="fv-row mb-8">
									<input placeholder="Konfirmasi Password" name="confirm-password" type="password" autocomplete="off" class="form-control bg-transparent" />
								</div>
								<div class="fv-row mb-8">
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="toc" value="1" />
										<span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Saya Menerima
										<a href="#" class="ms-1 link-primary">Persyaratan</a></span>
									</label>
								</div>
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
										<span class="indicator-label">Registrasi</span>
										<span class="indicator-progress">Mohon menunggu...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<div class="text-gray-500 text-center fw-semibold fs-6">Sudah memiliki akun? 
								<a href="{{ URL::to('login') }}" class="link-primary fw-semibold">Masuk</a></div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
		<script src="{{ asset('assets') }}/js/custom/authentication/sign-up/general.js"></script>
        <script>
            Inputmask({
                "mask": "a",
                "repeat": 50,
                "greedy": false
            }).mask("#username");
        </script>
	</body>
</html>