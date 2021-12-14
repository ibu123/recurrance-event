<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @include('includes.head')

    <style>
        .error {
            color:red;
            font-weight: 400
        }
    </style>
</head>
<body>
    <div class="container py-5 text-center">
        <h5>@yield('heading')</h5>
    </div>
    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>
@include('includes.footer')
@yield('js')
</html>
