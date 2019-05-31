@extends('layouts.demo-template')

@section('content')
    @include('logo')
    <div class="container">
        <div class="row justify-content-center">
            <a class="col-auto btn btn-danger btn-raised my-3" href="{{ url('login') }}">
                REPORT
            </a>
        </div>
        <div class="row">
            <div id="category" class="col">
                CATEGORY
            </div>
        </div>
        <div class="row">
            <div id="google-map" class="col">
                MAP
            </div>
        </div>
    </div>
@endsection