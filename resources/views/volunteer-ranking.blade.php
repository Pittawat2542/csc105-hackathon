@extends('layouts.main')

@section('content')
    @include('logo')

    <div class="container text-center" id="volunteerList">
        <h1>Top volunteer</h1>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-icon d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                    <h4 class="d-hidden card-h4" id="first">1<sup>st</sup></h4>
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-icon d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                    <h4 class="d-hidden card-h4" id="second">1<sup>st</sup></h4>
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-icon d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                    <h4 class="d-hidden card-h4" id="third">1<sup>st</sup></h4>
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-icon d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                    <h4 class="d-hidden card-h4" id="third">1<sup>st</sup></h4>
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-icon d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                    <h4 class="d-hidden card-h4" id="third">1<sup>st</sup></h4>
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-icon d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                    <h4 class="d-hidden card-h4" id="third">1<sup>st</sup></h4>
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-icon d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                    <h4 class="d-hidden card-h4" id="third">1<sup>st</sup></h4>
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-icon d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                    <h4 class="d-hidden card-h4" id="third">1<sup>st</sup></h4>
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-icon d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                    <h4 class="d-hidden card-h4" id="third">1<sup>st</sup></h4>
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-icon d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                    <h4 class="d-hidden card-h4" id="third">1<sup>st</sup></h4>
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>


    </div>
    <style>
        #volunteerList h4,#volunteerList i{
            font-size: 2.3rem;
            color: gray;
            position: absolute;
            left: 5%;
        }
        #volunteerList .card:nth-child(2) h4,#volunteerList .card:nth-child(2) i {
            font-size: 2.3rem;
            color: #fff41e;
            position: absolute;
            left: 5%;
        }
        #volunteerList .card:nth-child(3) h4,#volunteerList .card:nth-child(3) i {
            font-size: 2.3rem;
            color: 	#D3D3D3;
            position: absolute;
            left: 5%;
        }
        #volunteerList .card:nth-child(4) h4,#volunteerList .card:nth-child(4) i {
            font-size: 2.3rem;
            color: #b87333;
            position: absolute;
            left: 5%;
        }

        .user-img{
            border-radius: 35px;
            width: 60px;
        }
        @media screen and (min-width: 576px){
            .card-footer{
                justify-content: center;
            }
        }
        #volunteerList h4 {
            top:35% !important;
        }
        .trophy-icon{
            top: 0;
        }
        .card-h4{
            top: 30%;
        }
        @media screen and (max-width: 767px){
            #volunteerList h4 {
                display: none;
            }

            @media screen and (min-width: 576px){
                #volunteerList h4,#volunteerList i{
                    font-size: 3.3rem !important;
                }
            }
        }
    </style>
    <script>
         $(document).width();
        var first = document.querySelector('#first');

        vltl = document.querySelectorAll('#volunteerList h4');
        if (vltl[0]) vltl[0].innerHTML = '1<sup>st</sup>'
        if (vltl[1]) vltl[1].innerHTML = '2<sup>nd</sup>'
        if (vltl[2]) vltl[2].innerHTML = '3<sup>rd</sup>'
        for (i = 3; i < vltl.length; ++i) {
            vltl[i].innerHTML = `${i+1}<sup>th</sup>`
        }

    </script>
@endsection