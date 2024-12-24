<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Band Portofolio</title>
    <link rel="stylesheet" href="{{ asset('css/bandperform.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="{{ asset('img/logo parewa.png')}}" alt="">
        </div>
        <div class="menu">
            <a href="javascript:void(0)" id="home" class="inactive" onclick="toHome()">Home</a>
            <a href="javascript:void(0)" id="schedule" class="inactive" onclick="toSchedule()">Schedule</a>
            <a href="/admin/registration" id="bandregis" class="inactive" onclick="toBandRegis()">Registration History</a>
            <a href="javascript:void(0)" id="bandpartner" class="active" onclick="toBandPartner()">Band Partnership</a>
            <button>Login</button>
        </div>
    </nav>

    <div class="navigate">
        <p>> <a href="">Band Portofolio</a> > <a href="">Band Performance</a></p>
    </div>

    <main>
        <div class="left-content">
            <div class="cardvideo">
                <video src="{{ asset('uploads/videos/' . $performance->video) }}" controls></video>
                <h3>{{ $performance->band->name }} Tampil Kece Bawakan lagu 'Drown'</h3>
                <div class="rating">
                    <div class="star">
                        @for($i = 0; $i < 5; $i++)
                            <span class="fa fa-star {{ $i < round($averageRating) ? 'checked' : '' }}"></span>
                        @endfor
                    </div>
                    <div class="average" style="margin-left: 5px; margin-right:10px; font-size:12px">
                        <p>{{ round($averageRating, 1) }}<span> / </span>5.0</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-content">
            <div class="cardcomment">
                <h3>Comments</h3>
                <div class="comments">
                    @foreach($performance->reviews as $review)
                        <div class="komentar">
                            <img src="{{ asset('uploads/users/photos/' . $review->user->photo) }}" alt="">
                            <div class="komen">
                                <h5>{{ $review->user->name }}</h5>
                                <div class="starkomen">
                                    @for($i = 0; $i < 5; $i++)
                                        <span class="fa fa-star {{ $i < $review->rating ? 'checked' : '' }}"></span>
                                    @endfor
                                </div>
                                <p>{{ $review->review }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

</body>
</html>