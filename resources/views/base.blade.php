<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Midterm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css
    "integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">

<style>
    body {
        background-image: url('https://images.squarespace-cdn.com/content/v1/61da847c7b26e079bac65da0/d07cc77d-3942-40ba-a0b2-41150e74ff1c/IMG_8743.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        overflow-y: hidden;
        background-color: rgba(255, 255, 255, 0.5); /* Set the opacity here */
    }
</style>
</head>
<body>
    @if (auth()->check())

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <li class="nav-item">
                <a class="navbar-brand" href="{{ url('/dashboard') }}" style="color: white;">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/boutique') }}" style="color: white;">
                            <i class="fas fa-store"></i> Boutique
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/logs') }}" style="color: white;">
                            <i class="fas fa-book"></i> Logs
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="nav-link bg-transparent border-0" style="color: white;">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endif
    @yield('content')
</body>
</html>
