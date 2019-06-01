@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container text-center" id="volunteerList">
        <h1><i class="fas fa-trophy position-static text-primary-orange"></i> Top Volunteers <i
                class="fas fa-trophy position-static text-primary-orange"></i></h1>
        @foreach($ranks as $rank)
            <div class="card">
                <div class="card-footer">
                    <div class="mr-5 ml-3">
                        <i class="fas fa-medal trophy-icon d-block m-0"></i>
                        <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image">
                        <h4 class="d-hidden card-h4" id="first"></h4>
                    </div>
                    <div class="text-left">
                        <p class="h3 mt-0 font-weight-bold">{{$rank['user']->name}}</p>
                        <p class="h4"><span class="font-weight-bold"><i class="far fa-clock"></i> Volunteer Point : </span>{{$rank['value']}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        $(document).width();
        var first = document.querySelector('#first');

        vltl = document.querySelectorAll('#volunteerList h4');
        if (vltl[0]) vltl[0].innerHTML = '1<sup>st</sup>'
        if (vltl[1]) vltl[1].innerHTML = '2<sup>nd</sup>'
        if (vltl[2]) vltl[2].innerHTML = '3<sup>rd</sup>'
        for (i = 3; i < vltl.length; ++i) {
            vltl[i].innerHTML = `${i + 1}<sup>th</sup>`
        }

    </script>
@endsection
