@extends('layouts.main')

@section('content')
    @include('logo')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12"><span class="font-weight-bold">Total hours:</span> 1000</div>
            <div class="col-md-6 col-sm-12 text-right"><span class="font-weight-bold">John Doe</span> has
                fixed :
            </div>
        </div>
    </div>
    <div class="container">
        @for($i = 0; $i < 5; $i++)
            <div class="row">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-4 col-sm-12">
                            <img class="img-fluid"
                                 src="https://bredahlplumbing.com/wp-content/uploads/2018/03/pipe-frozen-400x267.jpg"
                                 alt="">
                        </div>
                        <div class="col-md-8 col-sm-12 d-flex flex-column justify-content-around">
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid
                                    atque
                                    beatae blanditiis debitis dolores eaque fugit in ipsa ipsum labore mollitia
                                    nam
                                    officiis perspiciatis porro quisquam repudiandae veniam, voluptates.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
