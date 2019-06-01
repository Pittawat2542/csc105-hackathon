@extends('layouts.main')

@section('content')
    <input type="checkbox" id="revealItems" class="d-none">
    <div class="prize-container row m-0 justify-content-center align-items-center">
        <div class="prize-items col-12 d-flex justify-content-center">
            <div class="prize-popup">
                test
            </div>
        </div>
        <label class="btn btn-primary bg-primary-blue" for="revealItems">REVEAL</label>
        <div class="sponsors col-3" style="background-image: url('/img/kmutt-logo.png')"></div>
        <div class="sponsors col-3" style="background-image: url('/img/sit-logo.png')"></div>
    </div>

    <style>
        .prize-container {
            width: 100%;
            height: calc(100vh - 70px);
            transition: all 1s;
        }
        .prize-popup {
            width: 35vmin;
            height: 35vmin;
            background-image: url('/img/prize-icon.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            filter: drop-shadow(16px 16px 100px black);
        }
        input[type="checkbox"]:checked + .prize-container {
            background-color: rgb(19, 19, 19);
        }
        input[type="checkbox"]:checked + * label[for="revealItems"] {
            display: none;
        }
        input[type="checkbox"]:not(:checked) + * .sponsors {
            display: none;
        }
        .sponsors {
            height: 100px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>
@endsection