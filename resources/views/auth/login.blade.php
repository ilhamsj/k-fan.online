@extends('layouts.auth')

@section('content')
    <section class="bg-primary">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height:100vh">
                <div class="col-12 col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header rounded-top border-0">
                            <a class="navbar-brand" href="/">
                                <i class="fa fa-flag" aria-hidden="true"></i>
                                <strong><span class="text-primary">Ka</span>fan</strong>
                            </a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
            
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Login') }} 
                                    </button>
                                    <a href="{{ route('auth.google') }}" class="btn btn-secondary btn-block">Google</a>
                                    <a href="{{ route('register') }}" class="btn btn-secondary btn-block">Register</a>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection