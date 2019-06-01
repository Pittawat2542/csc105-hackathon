@extends('layouts.main')

@section('content')
    <section class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">{{ __('Register') }}</div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name"><i class="far fa-id-badge"></i> {{ __('Name') }}</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="far fa-envelope"></i> {{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> {{ __('Password') }}</label>

                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm"><i class="fas fa-lock"></i> {{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary bg-primary-orange">
                        <i class="far fa-edit"></i> {{ __('Register') }}
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
