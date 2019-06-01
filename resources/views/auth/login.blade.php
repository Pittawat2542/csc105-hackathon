@extends('layouts.main')

@section('content')
    <section class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4><i class="fas fa-key" aria-hidden="true"></i> {{ __('Login') }}</h4></div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email"><i class="far fa-envelope"></i> {{ __('E-Mail Address') }}</label>

                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> {{ __('Password') }}</label>

                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-check">
                        <label for="remember" class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            {{ __('Remember Me') }}
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary bg-primary-orange">
                        <i class="fas fa-key"></i> {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </section>
@endsection
