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
                                <h4><span class="font-weight-bold"><i class="fab fa-microsoft"></i> Category</span> {{$raport->category->name}}
                                </h4>
                                <h4 class="font-weight-bold"><i class="fas fa-pencil-alt"></i> Description</h4>
                                <p>{{$raport->body}}</p>
                                <h5><i class="fas fa-map-marker-alt"></i> <span class="font-weight-bold">{{$raport->calculateDistance()}}</span>
                                    <span style="font-size: 80%;">from your location.</span></h5>
                                <h5><i class="fas fa-map-marker-alt"></i> <span class="font-weight-bold"><span style="font-size: 80%;">Location.</span>{{$raport->lng}}, {{$raport->lat}}</span>
                                    </h5>
                                <h5>Created {{$raport->created_at}}</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 d-flex flex-column justify-content-center">
                            <form action="{{route('report.show', $raport->id)}}">
                                @csrf
                                <button class="btn btn-success btn-block btn-round" type="submit"><i
                                            class="fas fa-tools"></i> Fixed
                                </button>
                            </form>
                            <a class="btn btn-info btn-block btn-round" href="/admin/raport/{{$raport->id}}/edit"><i class="far fa-edit"></i> EDIT</a>
                            <form action="{{route('admin.delete.raport', $raport->id)}}" METHOD="post">
                                <input type="hidden" name="_method" value="delete" />
                                @csrf
                                <button class="btn btn-danger btn-block btn-round" type="submit"><i
                                            class="fas fa-tools"></i> DELETE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        {{$raports->render()}}
    </div>
@endsection
