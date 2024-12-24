<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAREWA | live music</title>
    <link rel="stylesheet" href="{{ asset('css/bandportofolio.css') }}">
</head>
<body>

    <div class="confirm">
        <form action="/admin/approve" method="POST">
            @csrf
            <input type="hidden" name="band_id" value="{{ $detail->band_id }}">
            
            <button class="reject" name="action" value="reject" type="submit">Reject This Band</button>
            <button class="accept" name="action" value="accept" type="submit">Accept This Band</button>
        </form>
    </div>    
    
    <main>
        <div class="left-content">
            <img src="{{ asset('storage/' .$detail->foto_band )}}" alt="Band Image">
            <h1>{{ $detail->nama_band }}</h1>
            <h3>{{ $detail->genre }}</h3>
        </div>
    
        <div class="right-content">
            <h3 style="margin-bottom: 10px">About The Band</h3>
            <div class="card">
                <p style="line-height: 2; font-size: 15px;" pre-line>
                    {{ $detail->deskripsi_band}}
                </p>
            </div>

            <h3 style="margin-top: 20px">Video Portofolio</h3>
            <div class="youtube-container">
                <iframe 
                    src="https://www.youtube.com/embed/{{ $detail->sample_video }}" 
                    title="Video Portofolio" 
                    style="width: 100%; max-width: 560px; aspect-ratio: 16/9; border: none;" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </main>
</body>
</html>