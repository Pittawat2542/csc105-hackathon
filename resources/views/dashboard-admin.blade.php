@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container d-board my-4">
        <div class="row py-3">
            <div class="col-12 col-md-auto d-flex justify-content-center align-items-center">
                <div class="pic"></div>
            </div>
            <div class="col-12 col-md d-flex flex-wrap justify-content-center align-items-center">
                <h3 class="flex-shrink-0 w-100 text-center mt-2">Catagory</h3>
                <p class="flex-shrink-0 w-100 text-center mt-2">Description Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum blanditiis incidunt repellendus explicabo magni a nemo consectetur quas. Nostrum repellat libero dolorum! Dolores tenetur omnis vero fuga quam assumenda voluptate.</p>
                <a class="btn btn-success py-2 px-3 mx-1 text-white" href="#">FIXED</a>
                <a class="btn btn-warning py-2 px-3 mx-1 text-white" href="#">EDIT</a>
                <a class="btn btn-danger py-2 px-3 mx-1 text-white" href="#">DELETE</a>
            </div>
        </div>
    </div>
@endsection
