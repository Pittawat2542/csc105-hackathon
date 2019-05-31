@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container">
        <div class="row justify-content-center">
            <a class="col-auto btn btn-primary bg-primary-orange btn-raised btn-lg my-3" style="font-size: 1rem;"
               href="{{ route('create.raport') }}"><i class="far fa-file-alt"></i> REPORT</a>
        </div>
        <div class="row">
            <div id="category" class="col">
                <div class="row d-flex align-items-center">
                    <h4 class="ml-3 ml-md-0 font-weight-bold">Category:</h4>
                    <div class="col">
                        <select class="full-select">
                            <option data-display="Select">Nothing</option>
                            @if($categories)
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                @if($raports)
                    @foreach($raports as $raport)
                        <div class="row mx-1">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-md-4 col-sm-12">
                                        <img class="img-fluid"
                                             src="{{$raport->photo ? $raport->photo->path : ''}}"
                                             alt="">
                                    </div>
                                    <div class="col-md-8 col-sm-12 d-flex flex-column justify-content-around">
                                        <div>
                                            <h4 class="font-weight-bold"><i class="fas fa-pencil-alt"></i> Description</h4>
                                            <p>{{$raport->body}}</p>
                                        </div>
                                        <h5><i class="fas fa-map-marker-alt"></i> <span class="font-weight-bold">{{$raport->calculateDistance()}} KM</span> <span style="font-size: 80%;">from your location.</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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
                    data: {latitude: lat, longitude: lng, _method: 'GET'},
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
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    infoWindow.open(map);
                    map.setCenter(pos);
                }, function () {
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
