@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container">
        @for($i=0;$i<5;$i++)
        <div class="row mx-1">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-3 col-sm-12 text-center">
                        <img class="img-fluid"
                             src="https://via.placeholder.com/150"
                             alt="">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div>
                            <h4 class="font-weight-bold"><i class="fas fa-pencil-alt"></i> Description</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A asperiores, deleniti eaque
                                eveniet excepturi id illo impedit minus neque possimus quibusdam quod, ratione rem
                                repellendus similique ullam vero voluptas voluptates!</p>
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
            @endfor
    </div>
@endsection
