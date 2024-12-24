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
            <a href="javascript:void(0)" id="schedule" class="active">Schedule</a>
            <a href="/registration" id="bandregis" class="inactive">Band Registration</a>
            <a href="/band" id="bandpartner" class="inactive">Band Partnership</a>
            
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

    <div id="schedule-page" class="page2" style="display: flex">
        <div class="next">
            <h1 style="font-size: 60px">Upcoming <br>Performances</h1>
            <p style="font-size: 35px">Let's root for them!</p>
        </div>
        <div class="jadwal">
            @if ($scheduleDay1)
                <div class="content">
                    <h4>{{ \Carbon\Carbon::parse($scheduleDay1->tanggal)->format('D, d F Y') }}
                        <span>&nbsp; 7.00 PM - 00.00 AM</span>
                    </h4>
                    <div class="band">
                        <img src="{{ asset('storage/' . $scheduleDay1->foto_band) }}">
                        <div class="ket">
                            <h5>{{ $scheduleDay1->nama_band }}</h5>
                            <p>{{ $scheduleDay1->genre }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if ($scheduleDay2)
                <div class="content">
                    <h4>{{ \Carbon\Carbon::parse($scheduleDay2->tanggal)->format('D, d F Y') }}
                        <span>&nbsp; 7.00 PM - 00.00 AM</span>
                    </h4>
                    <div class="band">
                        <img src="{{ asset('storage/' . $scheduleDay2->foto_band) }}" >
                        <div class="ket">
                            <h5>{{ $scheduleDay2->nama_band }}</h5>
                            <p>{{ $scheduleDay2->genre }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if ($scheduleDay3)
                <div class="content">
                    <h4>{{ \Carbon\Carbon::parse($scheduleDay3->tanggal)->format('D, d F Y') }}
                        <span>&nbsp; 7.00 PM - 00.00 AM</span>
                    </h4>
                    <div class="band">
                        <img src="{{ asset('storage/' . $scheduleDay3->foto_band) }}" >
                        <div class="ket">
                            <h5>{{ $scheduleDay3->nama_band }}</h5>
                            <p>{{ $scheduleDay3->genre }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
        
    <script>
        function openForm(){
            const form = document.getElementById('form');
            form.style.display = "flex";
        }

        function closeForm(){
            const form = document.getElementById('form');
            form.style.display = "none";
        }
    </script>
    
</body>
</html>