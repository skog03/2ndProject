<!doctype html>
<html lang="en">
    

<head>
    <meta charset="utf-8">
    <title>Project 2 - {{ $title }}</title>
    <meta name="description" content="Web Technology 2nd Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="/js/admin.js"></script>
    <script src="/js/app.js"></script> 
</head>

<body>
    <nav class="navbar bg-primary mb-3" data-bs-theme="dark">
        <header class="container">
            <nav class="navbar navbar-expand-md bg-primary mb-3" data-bs-theme="dark">
                <div class="container">
                    <span class="navbar-brand mb-0 h1">Project 2</span>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                        @if(Auth::check())
 <li class="nav-item">
 <a class="nav-link" href="/artists">Artists</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="/albums">Albums</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="/genres">Genres</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="/logout">Log out</a>
 </li>
@else
 <li class="nav-item">
 <a class="nav-link" href="/login">Log in</a>
 </li>
@endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </nav>


    <main class="container">
        <div class="row">
            <div class="col">
                @yield('content')
            </div>
        </div>
    </main>


    <footer class="text-bg-dark mt-3">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    A. Aumale, 2023
                </div>
            </div>
        </div>
    </footer>

 
</body>

</html>