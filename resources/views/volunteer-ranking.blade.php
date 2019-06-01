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
                        <i class="fas fa-medal trophy-icon d-block m-0 rank"></i>
                        <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image">
                        <h4 class="card-h4 rank" id="first"></h4>
                    </div>
                    <div class="text-left">
                        <p class="h3 mt-0 font-weight-bold">{{$rank['user']->name}}</p>
                        <p class="h4 user-point"><span class="font-weight-bold"><i class="far fa-clock"></i> Volunteer Point : </span>{{$rank['value']}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        $(document).width();



        vltl = document.querySelectorAll('h4.rank');
        vltl2 = document.querySelectorAll('i.rank');
        vltl3 = document.querySelectorAll('#volunteerList .user-point');
        // for(var key in vltl3){
        //     console.log(vltl3[key].innerHTML);
        // }
        for (i = 0,currentRank = 1,lastPoint =vltl3[0].innerHTML.substring(56); i < vltl.length; ++i) {
            var thisPoint = vltl3[i].innerHTML.substring(85);
            console.log(i);
            if(i==0){
                vltl[i].classList.add('rank-1');
                vltl2[i].classList.add('rank-1');
                vltl[0].innerHTML = '1<sup>st</sup>'
                lastPoint =thisPoint;
                console.log(vltl[i].classList);
            }else{
                if(currentRank==1){
                    if(lastPoint==thisPoint){
                        vltl[i].classList.add('rank-1');
                        vltl2[i].classList.add('rank-1');
                        vltl[i].innerHTML = '1<sup>st</sup>'
                    }else{
                        vltl[i].classList.add('rank-2');
                        vltl2[i].classList.add('rank-2');
                        vltl[i].innerHTML = '2<sup>nd</sup>'
                        lastPoint = thisPoint;
                        currentRank =i;
                    }
                }else if(currentRank == 2){
                    if(lastPoint==thisPoint){
                        vltl[i].classList.add('rank-2');
                        vltl2[i].classList.add('rank-2');
                        vltl[i].innerHTML = '2<sup>nd</sup>'
                    }else{
                        vltl[i].classList.add('rank-3');
                        vltl2[i].classList.add('rank-3');
                        vltl[i].innerHTML = '3<sup>rd</sup>'
                        lastPoint = thisPoint;
                        currentRank =i;
                    }
                }
                else if(currentRank == 3){
                    if(lastPoint==thisPoint){
                        vltl[i].classList.add('rank-3');
                        vltl2[i].classList.add('rank-3');
                        vltl[i].innerHTML = '3<sup>rd</sup>'
                    }else{
                        vltl[i].innerHTML =i+'<sup>th</sup>'
                        lastPoint = thisPoint;
                        currentRank =i;
                    }
                }else {
                    if(lastPoint==thisPoint){
                        vltl[i].innerHTML = currentRank+'<sup>nd</sup>'
                    }else{
                        vltl[i].innerHTML =i+'<sup>th</sup>'
                        lastPoint = thisPoint;
                        currentRank =i;
                    }
                }
                console.log('curr:',currentRank,'i:',i,'last:',lastPoint)
            }

            // if(currentRank==1&&lastPoint)
            //
            // vltl[i].innerHTML = `${i + 1}<sup>th</sup>`
            // if (vltl[0]) vltl[0].innerHTML = '1<sup>st</sup>'
            // if (vltl[1]) vltl[1].innerHTML = '2<sup>nd</sup>'
            // if (vltl[2]) vltl[2].innerHTML = '3<sup>rd</sup>'
        }

    </script>
@endsection
