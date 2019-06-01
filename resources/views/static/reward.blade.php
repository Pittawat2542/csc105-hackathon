@extends('layouts.main')

@section('content')
    <input type="checkbox" id="revealItems" class="d-none">
    <div class="prize-container row m-0 justify-content-center align-items-center">
        <p class="col-12 text-popup display-4 text-white text-center">CONGRATULATIONS<br/>
            <small>User1112 has the highest score in ranking by 10010101 points</small></p>
        <div class="prize-lineup col-12 d-flex justify-content-center" style="margin-top: -10vh;">
            <div class="prize-box">
                <div class="prize-item" style="background-image: url('/img/do-in-thai-icon.png')"></div>
                <div class="prize-item" style="background-image: url('/img/do-in-thai-icon.png')"></div>
                <div class="prize-item" style="background-image: url('/img/do-in-thai-icon.png')"></div>
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
            transition: all 1s linear;
        }
        .prize-container .text-popup {
            transform: scale(0);
        }
        .prize-container .prize-box {
            position: relative;
            width: 32vmin; height: 32vmin;
            background-image: url('/img/prize-icon.png');
        }
        .prize-container .prize-item {
            position: absolute;
            width: 45%; height: 135%;
            background-position: center top;
            background-repeat: no-repeat;
            background-size: contain;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%) scale(0);
        }
        .prize-container .prize-item:nth-child(1) { animation: spin1 2s linear; animation-delay: 1s; animation-fill-mode: forwards; }
        .prize-container .prize-item:nth-child(2) { animation: spin2 2s linear; animation-delay: 1.7s; animation-fill-mode: forwards; }
        .prize-container .prize-item:nth-child(3) { animation: spin3 2s linear; animation-delay: 2.4s; animation-fill-mode: forwards; }
        @keyframes spin1 {
            0% { transform: translate(-50%, -50%) scale(0) rotate(0deg); }
            40% { transform: translate(-50%, -50%) scale(1) rotate(0deg); }
            100% { transform: translate(-50%, -50%) scale(1) rotate(420deg); }
        }
        @keyframes spin2 {
            0% { transform: translate(-50%, -50%) scale(0) rotate(0deg); }
            40% { transform: translate(-50%, -50%) scale(1) rotate(0deg); }
            100% { transform: translate(-50%, -50%) scale(1) rotate(360deg); }
        }
        @keyframes spin3 {
            0% { transform: translate(-50%, -50%) scale(0) rotate(0deg); }
            40% { transform: translate(-50%, -50%) scale(1) rotate(0deg); }
            100% { transform: translate(-50%, -50%) scale(1) rotate(300deg); }
        }
        .prize-box, .sponsors {
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }
        input[type="checkbox"]:checked + * .text-popup {
            animation: slidein .8s ease-in;
            animation-fill-mode: forwards;
        }
        input[type="checkbox"]:checked + .prize-container {
            background-color: rgb(19, 19, 19);
        }
        input[type="checkbox"]:not(:checked) + * .prize-lineup {
            filter: brightness(0%);
        }
        input[type="checkbox"]:checked + * .prize-lineup {
            animation: fadein 1s linear;
        }
        input[type="checkbox"]:not(:checked) + * .prize-item {
            display: none;
        }
        input[type="checkbox"]:checked + * label[for="revealItems"], input[type="checkbox"]:not(:checked) + * .sponsors {
            display: none;
        }
        input[type="checkbox"]:checked + * .sponsors {
            animation: slidein .8s linear;
            animation-delay: .5s;
            animation-fill-mode: forwards;
            transform: scale(0);
        }
        .sponsors {
            height: 20vmin;
            max-height: 100px;
        }
        @keyframes fadein {
            from { filter: brightness(0%); transform: scale(.1); }
        }
        @keyframes slidein {
            from { position: relative; transform: scale(0); top: 15%; }
            to { position: relative; transform: scale(1); top: 0; }
        }
    </style>
@endsection