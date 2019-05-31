@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container">
        <div class="row justify-content-center">
            <a class="col-auto btn btn-danger btn-raised my-3" style="font-size: 1rem;"
               href="{{ Auth::guest()?url('login'):url('report') }}">
                REPORT
            </a>
        </div>
        <div class="row">
            <div id="category" class="col">
                CATEGORY
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
                console.log(position);
                lat = position.coords.latitude;
                lng = position.coords.longitude;

                $.ajax({
                    url: '/getgeo',
                    data: {latitude: lat, longitude: lng, _method: 'GET'},
                    type: "POST",

                    success: function (data) {
                        alert('success');
                    }

                });
            });
        }

        var map;
        var position = {lat: parseFloat(lat), lng: parseFloat(lng)};

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: position,
                zoom: 20
            });

            var marker = new google.maps.Marker({position: position, map: map});
        }
    </script>
@endsection
