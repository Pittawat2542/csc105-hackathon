@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container">
        @if($raports)
            @foreach($raports as $raport)
            <div class="row mx-1">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-3 col-sm-12 text-center">
                            <img class="img-fluid"
                                 src="{{$raport->photo ? $raport->photo->path: 'https://via.placeholder.com/300'}}"
                                 alt="">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div>
                                <h4 class="font-weight-bold"><i class="fas fa-pencil-alt"></i> Description</h4>
                                <p>{{$raport->body}}</p>
                                <h5><i class="fas fa-map-marker-alt"></i> <span class="font-weight-bold">{{$raport->calculateDistance()}} KM</span>
                                    <span style="font-size: 80%;">from your location.</span></h5>
                                <h5>Created {{$raport->created_at}} by {{$raport->user->name}}</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 d-flex flex-column justify-content-center">
                            <a class="btn btn-success btn-lg py-2 px-3 mx-1 text-white" href="#"><i class="far fa-check-circle"></i> FIXED</a>
                            <a class="btn btn-info btn-lg py-2 px-3 mx-1 text-white" href="#"><i class="far fa-edit"></i> EDIT</a>
                            <a class="btn btn-danger btn-lg py-2 px-3 mx-1 text-white" href="#"><i class="far fa-trash-alt"></i> DELETE</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        {{$raports->render()}}
    </div>
@endsection
