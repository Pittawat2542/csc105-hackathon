@extends('layouts.main')

@section('content')
    <section>
        <div class="container my-3 bg-white">
            <div class="row">
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
                    <h2>Scott Martin</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab cumque deleniti dolore doloremque
                        eius eos, eveniet facilis fugiat, impedit ipsa nesciunt nostrum quis ratione rerum similique
                        totam veritatis voluptas! Magni.</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <h4>Category:</h4>
                <div class="col">
                    <select name="" id="" class="wide-select">
                        <option value="">TEST</option>
                        <option value="">TEST</option>
                        <option value="">TEST</option>
                    </select>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('select').niceSelect();
        });
    </script>
@endsection
