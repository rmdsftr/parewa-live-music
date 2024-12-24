<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAREWA | live music</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        main{
            margin-top: 150px;
            height: 75vh;
            padding: 50px;
            overflow-y: auto;
            display: flex;
            align-items: flex-start;
        }

        input{
            padding: 10px;
            border: 0;
            border-radius: 25px;
            width: 300px;
        }
        .profil, .band, .password{
            margin-left: 30px;
            margin-right: 30px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="{{ asset('img/logo parewa.png')}}" alt="">
        </div>
        <div class="menu">
            <a href="/grup" id="home" class="inactive">Home</a>
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
        <div class="profil" id="edit-profile">
            <form action="{{ route('edit.user')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>Edit Profile</h3>
                <br>
        
                <label for="name">Full Name</label>
                <br>
                <input type="text" name="nama" id="name" value="{{ $data_user->name }}" required>
                <br><br>
                <label for="email">Email Address</label>
                <br>
                <input type="email" name="email" id="email" value="{{ $data_user->email }}" required>
                <br><br>
                <button type="submit">Save Changes</button>
            </form>
        </div>

        <div class="band">
            <form action="{{ route('edit.band')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>Edit Band</h3>
                <br>
                <label for="band_name">Band Name</label>
                <br>
                <input type="text" name="nama_band" id="band_name" value="{{ $data_band->nama_band }}" required>
                <br><br>
                <label for="genre">Genre</label>
                <br>
                <input type="text" name="genre" id="genre" value="{{ $data_band->genre }}" required>
                <br><br>
                <button type="submit">Save Changes</button>
            </form>
        </div>
    
        <div class="password" id="change-password">
            <form action="{{ route('edit.password')}}" method="POST">
                @csrf
        
                <h3>Change Password</h3>
                <br>
    
        
                <label for="current_password">Current Password</label>
                <br>
                <input type="password" name="current_password" id="current_password" required>
                <br><br>
                <label for="new_password">New Password</label>
                <br>
                <input type="password" name="new_password" id="new_password" required>
                <br><br>
                <label for="confirm_password">Confirm New Password</label>
                <br>
                <input type="password" name="confirm_password" id="confirm_password" required>
                <br><br>
                <button type="submit">Change Password</button>
            </form>
        </div>
    </main>
</body>
</html>