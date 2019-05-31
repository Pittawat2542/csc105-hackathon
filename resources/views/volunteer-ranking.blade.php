@extends('layouts.main')

@section('content')
    @include('logo')

    <div class="container text-center">
        <h1>Top volunteer</h1>
        <div class="card">
            <div class="card-footer">
                <div class="mr-3 ml-3">
                    <i class="fas fa-medal trophy-gold d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
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
                    <i class="fas fa-medal trophy-silver d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
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
                    <i class="fas fa-medal trophy-copper d-block m-0"></i>
                    <img src="https://randomuser.me/api/portraits/men/55.jpg" class="user-img" alt="user image" >
                </div>
                <div>
                    <p class="h3 mt-0">Name surname</p>
                    <p class="h4">Volunteer Point:1000</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .trophy-gold {
            position: absolute;
            top: 0;
            left: 5%;
            color: #fff41e;
        }
        .trophy-silver {
            color: 	#D3D3D3;
            position: absolute;
            top: 0;
            left: 5%;
        }
        .trophy-copper {
            color: #b87333;
            position: absolute;
            top: 0;
            left: 5%;
        }
        .user-img{
            border-radius: 35px;
            width: 60px;
        }
        .trophy-copper,.trophy-silver,.trophy-gold{
            font-size: 2.3rem;
        }
        @media screen and (min-width: 576px){
            .card-footer{
                justify-content: center;
            }
        }
    </style>
@endsection