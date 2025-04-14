<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>@yield('title')</title>
    </head>
    <body>
        <main>
            <header>
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{route('home')}}">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('employees.create')}}">Create employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('employees.dashboard')}}">Employees</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('courses.create')}}">Create courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link enable" href="{{route('locations.create')}}" aria-disabled="false">Create locations</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            @if (session('success'))
                <div class="container">
                    <br>
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                </div>
            @endif
            @yield('content')
            <footer>
                <p>by <i>Lucas Torres</i> &copy; 2025</p>
            </footer>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
