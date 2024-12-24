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
            <a href="javascript:void(0)" id="home" class="active">Home</a>
            <a href="/grup/schedule" id="schedule" class="inactive">Schedule</a>
            <a href="/grup/band" id="bandpartner" class="inactive">Band Partnership</a>
            
            @guest
                <a href="/login" class="login"><button>Login</button></a>
            @endguest
            
            @auth
                <div class="profil">
                    <img src="{{ asset('img/profilempty.png')}}" alt="">
                    <div class="popup-menu">
                        <a href="/grup/profil">Edit Profile</a>
                        <a href="/logout">Logout</a>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <main>
        <div class="desc">
            @if (isset($band))
            <h3>Today's Performance <span>{{ $performance->tanggal->format('d M Y') }} at 07:00 PM</span></h3>
                <h1>{{ $band->nama_band }}</h1>
                <h4>{{ $band->genre }}</h4>
            @endif
    
            @if(isset($performance))
                
            @else
                <h1>No performance scheduled for today.</h1>
            @endif
        </div>
        
        @if (isset($band))
            <div class="band-img">
                <img src="{{ asset('storage/' . $band->foto_band) }}" alt="Band Image">
            </div>
        @endif
    </main> 

</body>
</html>