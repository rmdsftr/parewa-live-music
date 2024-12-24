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
            <a href="/grup" id="home" class="inactive">Home</a>
            <a href="javascript:void(0)" id="schedule" class="active">Schedule</a>
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

    <div id="schedule-page" class="page2" style="display: flex">
        @if ($tampil)
            <div class="accept">
                <form action="/grup/confirm" method="POST">
                    @csrf
                    <h1>Parewa wants <br>your band <br>to perform <br>at <span style="color: yellow">{{ $tampil->tanggal }}</span></h1>
            
                    <div style="display: flex; flex-direction:column;">
                        <button type="submit" name="status" value="accepted" class="sure">Sure! We will perform</button>
                        <button type="submit" name="status" value="rejected" class="no">Sorry! Next time we will</button>
                    </div>
                </form>
            </div>
        @else
            @if (isset($ajukan))
                <div class="accept">
                    <h1>Your Band <br>Requested for</h1>
                    <h1 style="color:yellow">{{ \Carbon\Carbon::parse($ajukan->tanggal)->format('D, d F Y') }}</h1>
                </div>
            @else
                <div class="accept">
                    <h1>Your <br>Band <br>Wanna <br>Perform?</h1>
                    <button class="no" onclick="openForm()">Request a Schedule Here</button>
                </div>
            @endif
        @endif

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

    <section id="form" style="display: none">
        <form action="{{ route('grup.request')}}" method="post">
            @csrf
            <button type="button" class="close" onclick="closeForm()">X</button>
            <h5>What date your band wanna perform?</h5>
    
            <input type="date" name="tanggal" required>
    
            <input type="number" name="id" value="{{ auth()->id() }}" hidden>
    
            <button type="submit">Send Your Request</button>
        </form>
    </section>
    

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