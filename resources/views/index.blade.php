@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container" id="index-container">
        <div class="row justify-content-center">
            <a class="col-auto btn btn-primary bg-primary-orange btn-raised btn-lg my-3 mb-5 mr-2"
               style="font-size: 1rem;"
               href="{{ route('create.raport') }}"><i class="far fa-file-alt"></i> REPORT</a>
            @auth
                <a class="col-auto btn btn-primary bg-primary-blue btn-raised btn-lg my-3 mb-5"
                   style="font-size: 1rem;"
                   href="{{route('volunteer.index')}}"><i class="fas fa-hand-holding-heart"></i> VOLUNTEER</a>
            @endauth
        </div>
        <div class="row">
            <div id="category" class="col">
                <div class="row d-flex align-items-center">
                    <h4 class="ml-3 ml-md-0 font-weight-bold"><i class="fab fa-microsoft"></i> Category:</h4>
                    <div class="col">
                        <select class="full-select" name="category-selector">
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
                                             src="{{$raport->photo ? $raport->photo->path: 'https://via.placeholder.com/300'}}"
                                             alt="">
                                    </div>
                                    <div class="col-md-8 col-sm-12 d-flex flex-column justify-content-around">
                                        <div>
                                            <h4 class="font-weight-bold"><i class="fas fa-pencil-alt"></i> Description
                                            </h4>
                                            <p>{{$raport->body}}</p>
                                        </div>
                                        <h5><i class="fas fa-map-marker-alt"></i> <span class="font-weight-bold">{{$raport->calculateDistance()}} KM</span>
                                            <span style="font-size: 80%;">from your location.</span></h5>
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

        var apiGeolocationSuccess = function (position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;

            $.ajax({
                url: '/getgeo',
                data: {latitude: lat, longitude: lng, _method: 'GET'},
                type: "POST",
                success: function (data) {
                    console.log({lat: lat, lng: lng});
                }

            });
        };

        var tryAPIGeolocation = function () {
            $.post("https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyB5pqlf37NqcN8xW6-FW2pbFEgpZ7ssTIk", function (success) {
                apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
            })
                .fail(function (err) {
                    // alert("API Geolocation error! \n\n" + err);
                });
        };

        tryAPIGeolocation();

        function initMap() {
            var lat_collection = [
                @if($raports)
                @foreach($raports as $raport)
                {{$raport['lat'].','}}
                @endforeach
                @endif
            ];
            var lng_collection = [
                @if($raports)
                @foreach($raports as $raport)
                {{$raport['lng'].','}}
                @endforeach
                @endif
            ];
            var sit_kmutt = {lat: 13.652594, lng: 100.493621};
            var map = new google.maps.Map(document.getElementById("map"), {center: sit_kmutt, zoom: 19});
            var infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);
            service.getDetails({placeId: "ChIJ9ZZzpVGi4jARI56-Js0p2C8"}, function (place, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    var marker;
                    @if($raports)
                        @foreach($raports as $raport)
                        marker = new google.maps.Marker({
                        map: map, position: {
                            lat: lat_collection[{{$loop->index}}],
                            lng: lng_collection[{{$loop->index}}],
                            title: '{{$raport->category->name}}',
                        }
                    });

                    google.maps.event.addListener(marker, "click", function () {

                        infowindow.setContent("<div class='text-center'>" +
                            "<img style='max-height: 10rem;' src='{{$raport->photo ? $raport->photo->path: 'https://via.placeholder.com/300'}}'>" +
                            "<h2>{{$raport->category->name}}</h2><p><br>{{$raport->body}}</p></div>");
                        infowindow.open(map, this)
                    });
                    @endforeach
                    @endif
                }
            })
        }
    </script>
@endsection
