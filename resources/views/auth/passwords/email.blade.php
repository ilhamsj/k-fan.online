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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </form>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection