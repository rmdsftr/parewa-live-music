<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAREWA | live music</title>
    <link rel="stylesheet" href="{{ asset('css/indexadmin.css') }}">
    <style>
        main{
            display: flex;
            flex-direction: column
        }

        .card{
            display: flex;
            justify-content: start;
            align-content: center;
            padding: 20px;
            width: 90%;
            background-color: rgba(0, 0, 0, 0.499);
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        main img{
            width: 100px;
            height: 100px;
        }

        .profil{
            margin-left: 20px;
        }

        .profil h4{
            font-weight: 600;
        }

        .profil p{
            color: #FDDE05;
        }

        .card a{
            text-decoration: none;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            font-size: 12px;
            background-color: white
        }

        .view{
            margin-right: 0;
            margin-left: auto;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="{{ asset('img/logo parewa.png')}}" alt="">
        </div>
        <div class="menu">
            <a href="/admin" id="home" class="inactive" >Home</a>
            <a href="/admin/schedule" id="schedule" class="inactive" >Schedule</a>
            <a href="javascript:void(0)" id="bandregis" class="active" >Registration History</a>
            <a href="/admin/band" id="bandpartner" class="inactive" >Band Partnership</a>
            
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
    
    <main>
        @foreach ($regis as $band)
            <div class="card">
                <img src="{{ asset('storage/' .$band->foto_band)}}" alt="">
                <div class="profil">
                    <h4>{{ $band->nama_band}}</h4>
                    <p>{{ $band->genre }}</p>
                    <p style="font-size: 12px; color: rgba(255, 255, 255, 0.688); margin-top:7px;">{{ $band->create_date }}</p>
                </div>
                <div class="view">
                    <a href="/admin/registration/{{ $band->band_id }}">View Portofolio</a>
                </div>
            </div>
        @endforeach
    </main>
</body>
</html>