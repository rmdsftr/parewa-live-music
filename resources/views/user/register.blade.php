<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTER</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <main>
        <div class="left">
            <img src="{{ asset('img/logo parewa.png') }}" alt="">
        </div>
        <div class="right">
            <form action="/register" method="post">
                @csrf
                <h2>Sign Up</h2>
                <div class="here">
                    <p>If you already have an account</p>
                    <a href="/login">Login Here</a>
                </div>

                @error('email')
                    <p id="error-message">{{ $message }}</p>
                @enderror

                <input type="text" name="fullname" id="" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <input type="password" placeholder="Confirm Password" id="confirm" required>
                <p id="error-message" style="display: none"></p>
                <button class="login" type="submit">REGISTER</button>
            </form>
        </div>
    </main>

    <script>
        const passwordField = document.getElementById('password');
        const confirmField = document.getElementById('confirm');
        const error = document.getElementById('error-message');

        function validatePassword(){
            const password = passwordField.value;
            const confirm = confirmField.value;

            if(password.length < 6 || confirm.value < 6){
                error.style.display = 'block';
                error.textContent = 'Password minimal 6 karakter';
            } else{
                if(password && confirm){
                    if(password !== confirm){
                        error.style.display = 'block';
                        error.textContent = 'Password tidak sesuai';
                    } else {
                        error.style.display = 'none';
                    }
                } else{
                    error.style.display = 'none';
                }
            }

        }

        passwordField.addEventListener('input', validatePassword);
        confirmField.addEventListener('input', validatePassword);
    </script>
</body>
</html>