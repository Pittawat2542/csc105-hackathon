@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12"><span class="font-weight-bold"><i class="far fa-clock"></i> Total points:</span> {{$raports->count()}}</div>
            <div class="col-md-6 col-sm-12 text-right"><span class="font-weight-bold"><i class="fas fa-user"></i> {{Auth::user()->name}}</span> has
                fixed :
            </div>
        </div>
    </div>
    <div class="container">
        @if($raports)
            @foreach($raports as $raport)
                <div class="row">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-4 col-sm-12">
                                <img class="img-fluid"
                                     src="{{$raport->photo ? $raport->photo->path: 'https://via.placeholder.com/300'}}"
                                     alt="">
                            </div>
                            <div class="col-md-8 col-sm-12 d-flex flex-column justify-content-around">
                                <div>
                                    <p>{{$raport->body}}</p>
                                    Location: {{$raport->lat}}, {{$raport->lng}} | Added {{$raport->created_at}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
