@extends('layouts.main')

@section('content')
    <input type="checkbox" id="revealItems" class="d-none">
    <div class="prize-container row m-0 justify-content-center align-items-center">
        <p class="col-12 text-popup display-4 text-white text-center">CONGRATULATIONS<br/>
            <small>User1112 has the highest score in ranking by 10010101 points</small></p>
        <div class="prize-lineup col-12 d-flex justify-content-center" style="margin-top: -4vh;">
            <div class="prize-box">
                <div class="prize-item" style="background-image: url('/img/do-in-thai-icon.png')"></div>
                <div class="prize-item" style="background-image: url('/img/do-in-thai-icon.png')"></div>
                <div class="prize-item" style="background-image: url('/img/do-in-thai-icon.png')"></div>
            </div>
        </div>
        <label class="btn btn-primary bg-primary-blue" for="revealItems">REVEAL</label>
        <p class="col-12 text-popup display-4 text-white text-center" style="font-size: 1.5rem;">Sponsored by</p>
        <div class="sponsors col-3" style="background-image: url('/img/kmutt-logo.png'); margin-top: -3vh;"></div>
        <div class="sponsors col-3" style="background-image: url('/img/sit-logo.png'); margin-top: -3vh;"></div>
    </div>
@endsection