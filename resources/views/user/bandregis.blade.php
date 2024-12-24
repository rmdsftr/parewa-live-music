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
            <a href="javascript:void(0)" id="bandregis" class="active">Band Registration</a>
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

    <div class="band-regis" id="band-regis">
        <div class="form-regis">
            <form action="{{ url('registerband') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="isi-form">
                    <div class="left">
                        <input type="text" placeholder="Band's Name" name="bandname" required>
                        <select name="genre" id="" required>
                            <option value="" hidden>Your Band's Main Genre</option>
                            <option value="Pop Indir">Pop Indie</option>
                            <option value="RNB">RNB</option>
                            <option value="Alternative Rock">Alternative Rock</option>
                        </select>
                        <div class="upload-video">
                            <img src="{{ asset('img/Upload.png')}}" alt="">
                            <label for="foto-upload" id="foto-label">Upload Group Photo</label>
                            <input type="file" name="foto" id="foto-upload" accept="image" required>
                        </div>
                        <input type="text" name="video" id="video-upload" placeholder="Link Youtube for video sample" required>
                    </div>
                    <div class="right">
                        <input type="text" name="wa" placeholder="Contact (WhatsApp)" required>
                        <input type="text" name="link" placeholder="Link spotify (optional)">
                        <textarea name="desc" id="" cols="1" rows="5" placeholder="Describe your group in interesting way" required></textarea>
                        <input type="text" name="status" id="" value="pending" hidden>
                        <input type="number" name="id" value="{{ auth()->id() }}" hidden>
                    </div>
                </div>
                <button type="submit">Submit Your Band's Portofolio</button>
            </form>
        </div>
        <div class="content-regis">
            <h1>Live Music <br>Performance <br>Registration</h1>
            <p>So our team can coordinate <br>with you for your live music <br>performance on time</p>
        </div>
    </div>

    <script>
        document.getElementById('foto-upload').addEventListener('change', function(event) {
            const label = document.getElementById('foto-label');
            const fileName = event.target.files[0]?.name || "Upload Group Photo";
            label.textContent = fileName;
        });
    </script>
    
</body>
</html>