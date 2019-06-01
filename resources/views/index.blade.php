@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container">
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

        function initMap() {
            var lat_collection = [13.652534, 13.652524, 13.652514, 13.652591, 13.632594, 13.652544, 13.652594, 13.653594, 13.653594, 13.652294];
            var lng_collection = [100.493631, 100.493321, 100.492621, 100.496621, 100.493421, 100.496621, 100.494621, 100.493681, 100.493627, 100.493821];
            var sit_kmutt = {lat: 13.652594, lng: 100.493621};
            var map = new google.maps.Map(document.getElementById("map"), {center: sit_kmutt, zoom: 17});
            var infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);
            service.getDetails({placeId: "ChIJ9ZZzpVGi4jARI56-Js0p2C8"}, function (place, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    var marker = new google.maps.Marker({map: map, position: sit_kmutt});
                    var newMarker;
                    for (var i = 0; i < 10; i++) {
                        newMarker = new google.maps.Marker({
                            map: map, position: {
                                lat: lat_collection[i],
                                lng: lng_collection[i]
                            }
                        });

                        google.maps.event.addListener(newMarker, "click", function () {
                            infowindow.setContent("<div><img src='https://www.waterdamageadvisor.com/wp-content/uploads/2015/05/Broken-and-Damaged-Pipes.jpg'><h2>Broken Pipe</h2><p><strong>" + place.name + "</strong><br>" + place.formatted_address + "</p></div>");
                            infowindow.open(map, this)
                        });
                    }
                    google.maps.event.addListener(marker, "click", function () {
                        infowindow.setContent("<div><img src='https://www.waterdamageadvisor.com/wp-content/uploads/2015/05/Broken-and-Damaged-Pipes.jpg'><h2>Broken Pipe</h2><p><strong>" + place.name + "</strong><br>" + place.formatted_address + "</p></div>");
                        infowindow.open(map, this)
                    });
                }
            })
        }
    </script>
@endsection
