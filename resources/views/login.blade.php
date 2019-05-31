@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container">
        <div class="row justify-content-center">
            <button class="col-auto btn btn-primary btn-raised my-3">
                <i class="fab fa-facebook"> </i> LOGIN
            </button>
        </div>
        <div class="row">
            <div id="google-map" class="col">
                MAP
            </div>
        </div>
    </div>
@endsection