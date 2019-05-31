@extends('layouts.demo-template')

@section('content')
    @include('logo')
    <div class="container">
        <div class="row justify-content-center">
            <button class="col-auto btn btn-primary btn-raised my-3">
                LOGIN
            </button>
        </div>
        <div class="row">
            <div id="google-map" class="col">
                MAP
            </div>
        </div>
    </div>
@endsection