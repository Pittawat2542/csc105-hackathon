@extends('layouts.main')

@section('content')
    <section>
        <div class="container my-3 bg-white">
            <div class="row mb-3 mb-md-0">
                <div class="mr-auto"></div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/user">Fixed list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/rank">Ranking</a>
                    </li>
                </ul>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-md-2 text-center">
                    <img class="rounded-circle" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User picture">
                </div>
                <div class="col-md-10">
                    <h2>{{Auth::user()->name}}</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab cumque deleniti dolore doloremque
                        eius eos, eveniet facilis fugiat, impedit ipsa nesciunt nostrum quis ratione rerum similique
                        totam veritatis voluptas! Magni.</p>
                </div>
            </div>
            <hr>
            <h3 class="font-weight-bold">Interested</h3>
            <div class="row mx-1">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-5 col-sm-12">
                            <img class="img-fluid"
                                 src="https://bredahlplumbing.com/wp-content/uploads/2018/03/pipe-frozen-400x267.jpg"
                                 alt="">
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <h4 class="font-weight-bold">Description</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid atque
                                beatae blanditiis debitis dolores eaque fugit in ipsa ipsum labore mollitia nam
                                officiis perspiciatis porro quisquam repudiandae veniam, voluptates.</p>
                            <form action="" class="mt-3">
                                @csrf
                                <button class="btn btn-success btn-block btn-round" type="submit"><i
                                        class="fas fa-tools"></i> Fixed
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row d-flex align-items-center">
                <h4>Category:</h4>
                <div class="col">
                    <select name="" id="" class="full-select">
                        @if($categories)
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
                @if($raports)
                    @foreach($raports as $raport)
                    <div class="row mx-1">
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-md-4 col-sm-12">
                                    <img class="img-fluid"
                                         src="{{$raport->photo ? $raport->photo->path: 'https://via.placeholder.com/300'}}"
                                         alt="">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <h4 class="font-weight-bold">Description</h4>
                                    <p>{{$raport->body}}</p>
                                </div>
                                <div class="col-md-2 col-sm-12 d-flex flex-column justify-content-center">
                                    <form action="{{route('report.show', $raport->id)}}">
                                        @csrf
                                        <button class="btn btn-success btn-block btn-round" type="submit"><i
                                                class="fas fa-tools"></i> Fixed
                                        </button>
                                    </form>
                                    <form action="">
                                        @csrf
                                        <button class="btn btn-danger btn-block btn-round" type="submit"><i
                                                class="fas fa-heart"></i> Interest
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $('select').niceSelect();
        });
    </script>
@endsection
