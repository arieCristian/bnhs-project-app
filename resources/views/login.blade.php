<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - BNHS APP</title>
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body style="background-color: #F2F7FF!important;">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh !important">
        <div class="card">
            <div class="card-header">
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">
                    Log in with your data that you entered during registration.
                </p>
            </div>
            <div class="card-body">
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input name="username" type="text" class="form-control form-control-xl" placeholder="Username" />
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input name="password" type="password" class="form-control form-control-xl" placeholder="Password" />
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                        Log in
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- <div id="auth">
        <div class="row h-100 d-flex align-items-center">
            <div class="col-lg-5 col-12">
                    <div class="auth-logo">
                        <a href="index.html">BNHS APP</a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">
                        Log in with your data that you entered during registration.
                    </p>
                    <form action="index.html">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" />
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Log in
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">
                            Don't have an account?
                            <a href="auth-register.html" class="font-bold">Sign up</a>.
                        </p>
                        <p>
                            <a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.
                        </p>
                    </div>
            </div>
        </div>
    </div> --}}
</body>

</html>
