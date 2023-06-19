<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                @php $lang = session('locale') @endphp
                <a class="navbar-brand" href="#">@lang('lang.text_hello') {{ Auth::user() ? 'user' : 'Guest'}}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        @guest
                        <a class="nav-link" href="{{ route('registration') }}">@lang('lang.text_registration')</a>
                        <a class="nav-link" href="{{ route('login')}}">@lang('lang.text_login')</a>
                        @else

                        <a class="nav-link" href="{{ route('logout')}}">@lang('lang.text_logout')</a>
                        @endguest
                        <a class="nav-link @if($lang =='fr') text-info @endif" href="{{ route('lang', 'fr')}}">Francais<i class='flag flag-france'></i></a>
                        <a class="nav-link @if($lang =='en') text-info @endif" href="{{ route('lang', 'en')}}">English<i class='flag flag-iran'></i></a>

                    </div>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold text-black" href="/">@lang('lang.text_student')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold text-black" href="/ville">@lang('lang.text_city')</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold text-black" href="/article">@lang('lang.text_article')</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold text-black" href="/document-page">@lang('lang.text_doc')</a>
                        </li>

                    </ul>
                </div>
        </nav>
        <div class="col-12 text-center">
            <h3 class="display-5 mt-5">
                <!-- {{ config('app.name') }} -->
                @yield('titleHeader')
            </h3>
        </div>
        @yield('content')
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>