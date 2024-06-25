<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Курсовая работа</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .cover-container {
            max-width: 42em;
        }
        .masthead {
            margin-bottom: 2rem;
        }
        .nav-masthead .nav-link {
            padding: .25rem 0;
            font-weight: 700;
            color: rgb(0, 0, 0);
            background-color: transparent;
            border-bottom: .25rem solid transparent;
        }
        .nav-masthead .nav-link + .nav-link {
            margin-left: 1rem;
        }
        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: rgba(255, 255, 255, .25);
        }
        .nav-masthead .nav-link.active {
            color: #000000;
            border-bottom-color: #000000;
        }
        .cover {
            padding: 0 1.5rem;
        }
    </style>
</head>
<body class="text-center">

<header class="masthead mb-auto">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <nav class="my-2 my-md-0 mr-md-3">
            @role('admin')
            <a class="p-2 text-dark" href="{{ route('admin.credits') }}">Данные о кредитах</a>
            @else
                <a class="p-2 text-dark" href="/">Оформление кредита</a>
                @endrole
                <a class="p-2 text-dark" href="{{ route('account') }}">Личный кабинет</a>
        </nav>
        @guest
            <a class="btn btn-outline-primary" href="{{ route('login') }}">Вход</a>
        @else
            <span class="mr-3">{{ Auth::user()->name }}</span>
            <a class="btn btn-outline-primary" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Выйти
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
</header>

@yield('main')

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- Input Mask JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function(){
        $('#phone').mask('+7 (000) 000-0000');
    });
</script>
</body>
</html>
