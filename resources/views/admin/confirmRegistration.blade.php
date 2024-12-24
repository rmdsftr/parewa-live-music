<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="{{ asset('img/logo parewa.png')}}" alt="">
        </div>
        <div class="menu">
            <a href="javascript:void(0)" id="home" class="inactive" onclick="toHome()">Home</a>
            <a href="javascript:void(0)" id="schedule" class="inactive" onclick="toSchedule()">Schedule</a>
            <a href="javascript:void(0)" id="bandregis" class="inactive" onclick="toBandRegis()">Registration History</a>
            <a href="javascript:void(0)" id="bandpartner" class="active" onclick="toBandPartner()">Band Partnership</a>
            <button>Login</button>
        </div>
    </nav>

    <div class="navigate">
        <p>> <a href="">Band Portofolio</a></p>
    </div>

    <div class="confirm">
        <form action="{{ route('band.reject', ['bandId' => $band->band_id]) }}" method="POST">
            @csrf
            <input type="hidden" name="band_id" value="{{ $band->band_id }}">
    
            <button type="submit">Reject This Band</button>
        </form>
    
        <form action="{{ route('band.accept', ['bandId' => $band->band_id]) }}" method="POST">
            @csrf
            <input type="hidden" name="band_id" value="{{ $band->band_id }}">
    
            <button type="submit">Accept This Band</button>
        </form>
    </div>
    
</body>
</html>