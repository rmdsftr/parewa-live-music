<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAREWA | live music</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="{{ asset('img/logo parewa.png')}}" alt="">
        </div>
        <div class="menu">
            <a href="/" id="home" class="inactive">Home</a>
            <a href="/schedule" id="schedule" class="inactive">Schedule</a>
            <a href="/registration" id="bandregis" class="inactive">Band Registration</a>
            <a href="javascript:void(0)" id="bandpartner" class="active">Band Partnership</a>
            
            @guest
                <a href="/login" class="login"><button>Login</button></a>
            @endguest
            
            @auth
                <div class="profil">
                    <img src="{{ asset('img/profilempty.png')}}" alt="">
                    <div class="popup-menu">
                        <a href="/profile/edit">Edit Profile</a>
                        <a href="/logout">Logout</a>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <div class="band-partner" id="band-partner">
        <div class="container">
            @foreach ($bands as $band)
                <a href="/band/{{ $band->band_id }}" style="text-decoration: none">
                    <div class="card">
                        <img src="{{ asset('storage/' .$band->foto_band) }}" alt="">
                        <h4>{{ $band->nama_band }}</h4>
                        <p>{{ $band->genre }}</p>
                        <div class="rate">
                            <img src="{{ asset('img/rating.png')}}" alt="">
                            <h6><span>4.9</span>/5</h6>
                            <p style="margin-left: 10px; margin-right: 10px;">|</p>
                            <h6><span>123</span> Reviews</h6>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    
</body>
</html>