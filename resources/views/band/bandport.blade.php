<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Band Portofolio</title>
    <link rel="stylesheet" href="{{ asset('css/bandport.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked{
            color: orange;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="{{ asset('img/logo parewa.png')}}" alt="">
        </div>
        <div class="menu">
            <a href="/" id="home" class="inactive">Home</a>
            <a href="/grup/schedule" id="schedule" class="inactive">Schedule</a>
            <a href="/grup/band" id="bandpartner" class="active">Band Partnership</a>
            <button>Login</button>
        </div>
    </nav>

    <div class="navigate">
        <p>> <a href="/band">Band Portofolio</a></p>
    </div>
    <main>
        <div class="left-content">
            <img src="{{ asset('storage/' . $band->foto_band) }}" alt="Band Image">
            <h1>{{ $band->nama_band }}</h1>
            <h3>{{ $band->genre }}</h3>
        </div>
    
        <div class="right-content">
            <h3 style="margin-bottom: 10px">About The Band</h3>
            <div class="card">
                <p style="line-height: 2; font-size: 15px;">
                    {{ $band->deskripsi_band }}
                </p>
            </div>

            <h3 style="margin-top: 20px">Video Portofolio</h3>
            <div class="youtube-container">
                <iframe 
                    src="https://www.youtube.com/embed/{{ $band->sample_video }}" 
                    title="Video Portofolio {{ $band->nama_band }}" 
                    style="width: 100%; max-width: 560px; aspect-ratio: 16/9; border: none;" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
    

            @if (isset($performances))
            <h3 style="margin-top: 30px; margin-bottom: 10px;">Performance History</h3>
            <div class="performance-history">
                @foreach($performances as $performance)
                    <div class="card">
                        <video src="{{ asset('storage/' . $performance->video) }}" controls poster="{{ asset('storage/' . $performance->video) }}"></video>
                        <div class="caption">
                            <a href="/bandperform/{{ $performance->performance_id }}" style="text-decoration: none; color: white;">
                                <h4>{{ $performance->title }}</h4>
                            </a>
                            <div class="rate">
                                <div class="star">
                                    @for($i = 0; $i < 5; $i++)
                                        <span class="fa fa-star {{ $i < round($performance->rating_averange) ? 'checked' : '' }}"></span>
                                    @endfor
                                </div>
                                <div class="average" style="margin-left: 5px; margin-right:10px; font-size:12px">
                                    <p>{{ round($performance->rating_averange, 1) }}<span> / </span>5.0</p>
                                </div>
                                <div class="comment" style="margin-left: 10px">
                                    <p><span>{{ $performance->total_review }}</span> Comments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

            
        </div>
    </main>
    
</body>
</html>