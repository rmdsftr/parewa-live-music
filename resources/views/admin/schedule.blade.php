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
            <a href="/admin" id="home" class="inactive" >Home</a>
            <a href="javascript:void(0)" id="schedule" class="active" >Schedule</a>
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


    <div id="schedule-page" class="page2" style="display: flex">
        <div class="next">
            <button onclick="openNewSchedule()">
                <img src="{{ asset('img/add.png')}}" alt="">
                New Schedule
            </button>
            <button onclick="openNewRequest()">
                <img src="{{ asset('img/req.png')}}" alt="">
                Schedule Request
            </button>
            <button onclick="openHistory()">
                <img src="{{ asset('img/clock.png')}}" alt="">
                Schedule History
            </button>
        </div>

        <div class="jadwal">
            @if ($scheduleDay1)
                <div class="content">
                    <h4>{{ \Carbon\Carbon::parse($scheduleDay1->tanggal)->format('D, d F Y') }}
                        <span>&nbsp; 7.00 PM - 00.00 AM</span>
                    </h4>
                    <form action="/cancel" method="post">
                        @csrf
                        <div class="band">
                            <img src="{{ asset('storage/' . $scheduleDay1->foto_band) }}">
                            <div class="ket">
                                <h5>{{ $scheduleDay1->nama_band }}</h5>
                                <p>{{ $scheduleDay1->genre }}</p>
                            </div>
                            <input type="hidden" name="band_id" value="{{ $scheduleDay1->band_id }}">
                            <input type="hidden" name="tanggal" value="{{ $scheduleDay1->tanggal }}">
                            <button type="submit" name="status" value="canceled">Cancel</button>
                        </div>
                    </form>
                </div>
            @endif
            @if ($scheduleDay2)
                <div class="content">
                    <h4>{{ \Carbon\Carbon::parse($scheduleDay2->tanggal)->format('D, d F Y') }}
                        <span>&nbsp; 7.00 PM - 00.00 AM</span>
                    </h4>
                    <form action="/cancel" method="post">
                        @csrf
                        <div class="band">
                            <img src="{{ asset('storage/' . $scheduleDay2->foto_band) }}" >
                            <div class="ket">
                                <h5>{{ $scheduleDay2->nama_band }}</h5>
                                <p>{{ $scheduleDay2->genre }}</p>
                            </div>
                            <input type="hidden" name="band_id" value="{{ $scheduleDay2->band_id }}">
                            <input type="hidden" name="tanggal" value="{{ $scheduleDay2->tanggal }}">
                            <button type="submit" name="status" value="canceled">Cancel</button>
                        </div>
                    </form>
                </div>
            @endif
            @if ($scheduleDay3)
                <div class="content">
                    <h4>{{ \Carbon\Carbon::parse($scheduleDay3->tanggal)->format('D, d F Y') }}
                        <span>&nbsp; 7.00 PM - 00.00 AM</span>
                    </h4>
                    <form action="/cancel" method="post">
                        @csrf
                        <div class="band">
                            <img src="{{ asset('storage/' . $scheduleDay3->foto_band) }}" >
                            <div class="ket">
                                <h5>{{ $scheduleDay3->nama_band }}</h5>
                                <p>{{ $scheduleDay3->genre }}</p>
                            </div>
                            <input type="hidden" name="band_id" value="{{ $scheduleDay3->band_id }}">
                            <input type="hidden" name="tanggal" value="{{ $scheduleDay3->tanggal }}">
                            <button type="submit" name="status" value="canceled">Cancel</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <section id="jadwal-baru" style="display: none">
        <form action="{{ route('admin.newSchedule') }}" method="POST">
            @csrf
            <button type="button" class="close" onclick="closeNewSchedule()">X</button>
            
            <select name="band" id="">
                <option value="" hidden>Choose Band</option>
                @foreach ($bands as $band)
                    <option value="{{ $band->band_id }}">{{ $band->nama_band }}</option>
                @endforeach
            </select>
            <input type="date" name="tanggal" id="" placeholder="Choose Date">
            <button type="submit">Add This Schedule</button>
        </form>
    </section>
    

    <section id="jadwal-request" style="display: none">
        <form action="{{ route('admin.approvesched') }}" method="POST">
            @csrf
            <button type="button" class="close" onclick="closeNewRequest()">X</button>
            <div class="content-req">
                @foreach ($requestedSchedule as $requested)
                    <div class="card" style="display: flex">
                        <img src="{{ asset('storage/' .$requested->foto_band) }}" alt="" style="width: 50px; height:50px;">
                        <div class="detail">
                            <h5>{{ $requested->nama_band }}</h5>
                            <p>Request for <span> {{ $requested->tanggal }}</span></p>
                        </div>
                        <div class="confirm" style="display: flex; align-items:center;">
                            <input type="text" name="band_id" value="{{ $requested->band_id }}" hidden>
                            <input type="text" name="tanggal" value="{{ $requested->tanggal }}" hidden>
                            <button type="submit" name="confirm" value="admin_rejected">
                                <img src="{{ asset('img/x.png') }}" alt="">
                            </button>
                            <button type="submit" name="confirm" value="admin_accepted">
                                <img src="{{ asset('img/y.png') }}" alt="">
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
    </section>
    

    <section id="history" style="display: none">
        <form action="" method="post">
            @csrf
            <button type="button" class="close" onclick="closeHistory()">X</button>
            <div class="content-req">
                @foreach ($historySchedule as $history)
                    <div class="card">
                        <img src="{{ asset('storage/' .$history->foto_band)}}" alt="" style="width: 50px; height:50px;">
                        <div class="detail">
                            <h5>{{ $history->nama_band }}</h5>
                            <p>{{ $history->tanggal }}</p>
                        </div>
                        <div class="confirm">
                            @if ($history->status_jadwal == 'Performance Successfull')
                                <h4 class="success">Performance Successfull</h4>
                            @else
                                <h4 class="cancel">{{ $history->status_jadwal }}</h4>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
    </section>

    <script>
        function openNewSchedule(){
            const form = document.getElementById('jadwal-baru');
            form.style.display = "flex";
        }

        function closeNewSchedule(){
            const form = document.getElementById('jadwal-baru');
            form.style.display = "none";
        }

        function openNewRequest(){
            const form = document.getElementById('jadwal-request');
            form.style.display = "flex";
        }

        function closeNewRequest(){
            const form = document.getElementById('jadwal-request');
            form.style.display = "none";
        }

        function openHistory(){
            const form = document.getElementById('history');
            form.style.display = "flex";
        }

        function closeHistory(){
            const form = document.getElementById('history');
            form.style.display = "none";
        }
    </script>
    
</body>
</html>