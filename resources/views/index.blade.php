@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container">
        <div class="row justify-content-center">
            <a class="col-auto btn btn-primary btn-raised my-3" style="font-size: 1rem;"
               href="{{ route('create.raport') }}">REPORT</a>
        </div>
        <div class="row">
            <div id="category" class="col">
                <div class="row d-flex align-items-center">
                    <h4>Category:</h4>
                    <div class="col">
                        <select name="" id="" class="full-select">
                            <option value="">TEST</option>
                            <option value="">TEST</option>
                            <option value="">TEST</option>
                        </select>
                    </div>
                </div>
                @for($i = 0; $i < 5; $i++)
                    <div class="row mx-1">
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-md-4 col-sm-12">
                                    <img class="img-fluid"
                                         src="https://bredahlplumbing.com/wp-content/uploads/2018/03/pipe-frozen-400x267.jpg"
                                         alt="">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <h4 class="font-weight-bold">Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid atque
                                        beatae blanditiis debitis dolores eaque fugit in ipsa ipsum labore mollitia nam
                                        officiis perspiciatis porro quisquam repudiandae veniam, voluptates.</p>
                                </div>
                                <div class="col-md-2 col-sm-12 d-flex flex-column justify-content-center">
                                    <form action="">
                                        @csrf
                                        <button class="btn btn-success btn-block btn-round" type="submit"><i
                                                class="fas fa-tools"></i> Fixed
                                        </button>
                                    </form>
                                    <form action="">
                                        @csrf
                                        <button class="btn btn-danger btn-block btn-round" type="submit"><i
                                                class="fas fa-heart"></i> Interest
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            </div>
        </div>
        <div class="row">
            <div id="map" class="col mb-5">
            </div>
        </div>
    </div>

    <script>
        var lat;
        var lng;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                lat = position.coords.latitude;
                lng = position.coords.longitude;

                $.ajax({
                    url: '/getgeo',
                    data: {latitude:  lat, longitude: lng, _method: 'GET'},
                    type: "POST",

                    success: function (data) {
                    }

                });
            });
        }

        var locationObj = {lat: parseFloat(lat), lng: parseFloat(lng)};

        var map, infoWindow;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 6
            });
            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    infoWindow.open(map);
                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
    </script>
@endsection
