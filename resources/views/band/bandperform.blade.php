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
            <a href="javascript:void(0)" id="home" class="inactive" >Home</a>
            <a href="javascript:void(0)" id="schedule" class="inactive" >Schedule</a>
            <a href="javascript:void(0)" id="bandpartner" class="active" >Band Partnership</a>
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

    <div class="navigate">
        <p>> <a href="">Band Portofolio</a> > <a href="">Band Performance</a></p>
    </div>
    

    <main>
        <div class="left-content">
            <div class="cardvideo">
                <video src="{{ asset('storage/' . $performance->video) }}" controls></video>
                <h3>{{ $performance->title }}</h3>
            </div>

            <div class="give">
                <p>Impressed with the performance?</p>
                <button onclick="openForm()">Give your rating here</button>
            </div>
        </div>

        <div class="right-content">
            <div class="cardcomment">
                <h3>Comments</h3>
                <div class="comments">
                    @if (isset($detail))
                        @foreach($detail as $review)
                        <div class="komentar">
                            <img src="" alt="">
                            <div class="komen">
                                <h5></h5>
                                <div class="starkomen">
                                    {{-- @for($i = 0; $i < 5; $i++)
                                        <span class="fa fa-star {{ $i < $review->rating ? 'checked' : '' }}"></span>
                                    @endfor --}}
                                </div>
                                <p></p>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>No comment here yet</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </main>


    <section style="display: none" id="form">
        <form action="/rating" method="post">
            @csrf
            <button type="button" class="close" onclick="closeForm()">X</button>
            <h3>How much the band performance impress you? Give them stars!</h3>
            <input type="hidden" name="performance_id" value="{{ $performance->performance_id }}">
            <input type="number" name="id" value="{{ auth()->id() }}" hidden>
            <div class="rating">
                <i class="fas fa-star" data-value="1"></i>
                <i class="fas fa-star" data-value="2"></i>
                <i class="fas fa-star" data-value="3"></i>
                <i class="fas fa-star" data-value="4"></i>
                <i class="fas fa-star" data-value="5"></i>
            </div>
            <textarea name="review" id="" rows="10" placeholder="Thoughts about the performance?"></textarea>
            <button>Submit your review</button>
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