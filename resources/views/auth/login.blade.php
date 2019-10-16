@extends('layouts.auth')

@section('content')
    <section class="bg-primary">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height:100vh">
                <div class="col-12 col-sm-5">
                    <div class="card shadow-sm">
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
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }} 
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
            
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection