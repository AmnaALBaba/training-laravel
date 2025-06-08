@php
    use App\Models\Category;
    $categories = new Category();
    $categories = $categories->get();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        a{
            text-decoration: none;
            color : black;
        }
    </style>

</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Blogs</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @foreach ($categories as $item)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('category-group') ? 'active' : '' }}"
                                    aria-current="page"
                                    href="{{ route('category-group', [$item->id, $item->name]) }}">{{ $item->name }}</a>


                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
