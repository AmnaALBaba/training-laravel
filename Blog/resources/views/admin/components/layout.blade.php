<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <header>
        @if (Auth::check())
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('admin') }}">Admin</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('admin') }}">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('post') ? 'active' : '' }}"
                                    href="{{ route('post') }}">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('user') ? 'active' : '' }}"
                                    href="{{ route('user') }}">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('logout') ? 'active' : '' }}"
                                    href="{{ route('logout') }}">Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        @endif

    </header>

    <main>
        @yield('content')
    </main>


</body>

</html>
