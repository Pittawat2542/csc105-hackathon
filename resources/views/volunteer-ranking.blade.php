@extends('layouts.demo-template')

@section('content')
    @include('logo')

    <div class="container text-center">
        <h1>Top volunteer</h1>
        <div class="container">
            <div class="d-inline-block mr-2">
                <i class="fas fa-medal gold display-3"></i>
            </div>
            <div class="d-inline-block">
                <p class="h3">Name surname</p>
                <p class="h4">Volunteer Point:1000</p>
            </div>
        </div>
    </div>
@endsection