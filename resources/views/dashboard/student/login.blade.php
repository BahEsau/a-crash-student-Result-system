@extends('dashboard.student.layout.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h2 style="margin-top:30px">Student Login</h2>
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <form action="{{route( 'student.dologin') }}" method="POST" autocomplete="off">
                @csrf

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label><br>
                    <input type="email" class="form-control" name="email" id="email" placeholder="enter email" value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Password</label><br>
                    <input type="password" class="form-control" name="password" id="password" placeholder="enter password" >
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

              </form>
        </div>
    </div>


@endsection





    {{-- <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card " style="margin-top: 100px">
                    <div class="card-header text-center text-primary">{{ __('Login') }}</div>

                    <div class="card-body  ">
                        <form method="POST" action="{{ route('student.dologin') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
