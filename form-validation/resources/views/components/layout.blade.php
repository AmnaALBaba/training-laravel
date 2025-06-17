<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">Forms</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('forms.form1')?'active':''}}" aria-current="page" href="{{route('forms.form1')}}">Form 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('forms.form2')?'active':''}}" href="{{route('forms.form2')}}">Form 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('forms.form3')?'active':''}}" href="{{route('forms.form3')}}">Form 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('forms.form4')?'active':''}}" href="{{route('forms.form4')}}">Form 4</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>


    </header>

    <main>{{ $slot }}</main>
    <footer class="text-center m-0">All copy right reserved</footer>

</body>

</html>
