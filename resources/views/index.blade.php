@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container">
        <div class="row justify-content-center">
            <a class="col-auto btn btn-danger btn-raised my-3" style="font-size: 1rem;" href="{{ route('create.raport') }}">
                REPORT
            </a>
        </div>
        <div class="row">
            <div id="category" class="col">
                CATEGORY
            </div>
        </div>
        <div class="row">
            <div id="map" class="col">
            </div>
        </div>
    </div>

    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });
        }
    </script>
@endsection
