<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAREWA | live music</title>
    <link rel="stylesheet" href="{{ asset('css/indexadmin.css') }}">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="{{ asset('img/logo parewa.png')}}" alt="">
        </div>
        <div class="menu">
            <a href="javascript:void(0)" id="home" class="active" >Home</a>
            <a href="/admin/schedule" id="schedule" class="inactive" >Schedule</a>
            <a href="/admin/registration" id="bandregis" class="inactive" >Registration History</a>
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
        <div class="desc">
            @if (isset($band))
                <h3>Today's Performance <span>{{ $performance->tanggal->format('d M Y') }} at 07:00 PM</span></h3>
                <h1>{{ $band->nama_band }}</h1>
                <h4>{{ $band->genre }}</h4>
            @endif
    
            @if(isset($performance))
                <button type="button" onclick="openFormUpload()">Upload Performance Clip</button>
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

    <section id="form-upload" style="display: none;">
        <form action="/upload" method="post" enctype="multipart/form-data">
            @csrf
            <button type="button" class="close" onclick="closeFormUpload()">X</button>
            <textarea name="title" rows="3" placeholder="Write an interesting title for the video" required></textarea>
            <div class="upload-video">
                <img src="{{ asset('img/Upload.png')}}" alt="Upload Icon">
                <label for="video-upload">Upload Performance</label>
                <input type="file" name="video" id="video-upload" accept="video/*" required>
            </div>
            @if (isset($band))
                <input type="text" name="performance_id" value="{{ $performance->tanggal }}" hidden>
                <input type="text" name="band_id" value="{{ $band->band_id }}" hidden>
                <input type="date" name="tanggal" value="{{ $performance->tanggal }}" hidden>
            @endif
            <button type="submit">Upload Video</button>
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

        function openFormUpload(){
            const form = document.getElementById('form-upload');
            form.style.display = "flex";
        }

        function closeFormUpload(){
            const form = document.getElementById('form-upload');
            form.style.display = "none";
        }
    </script>
    
</body>
</html>