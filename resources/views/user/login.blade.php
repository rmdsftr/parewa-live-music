<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <main>
        <div class="left">
            <img src="{{ asset('img/logo parewa.png') }}" alt="">
        </div>
        <div class="right">
            <form action="/login" method="post">
                @csrf
                <h2>Sign In</h2>
                <div class="here">
                    <p>If you don't have an account yet, you can </p>
                    <a href="/register">Register Here</a>
                </div>

                @error('email')
                    <p id="error-message">{{ $message }}</p>
                @enderror

                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <div class="remember">
                    <input type="checkbox" name="show" id="show" onclick="toggle()">
                    <p>Show password</p>
                </div>
                <button class="login">LOGIN</button>
                <div class="or">
                    <div class="line"></div>
                    <p>or</p>
                    <div class="line"></div>
                </div>
                <button class="google">
                    <img src="{{ asset('img/google.png') }}" alt="" style="height: 25px; width:25px;">
                    Continue with Google
                </button>
            </form>
        </div>
    </main>

    <script>
        function toggle() {
            const password = document.getElementById('password');
            const show = document.getElementById('show');

            if (show.checked) {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        }
    </script>
</body>
</html>