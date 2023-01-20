<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> @yield('title') | BNHS </title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}" />
    {{-- <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png"/> --}}
    @stack('style')
</head>

<body>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main" class="layout-navbar navbar-fixed">
           @include('layouts.navbar')
            <div id="main-content">
                <div class="page-heading">
                    @yield('content')
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('script')
</body>

</html>
