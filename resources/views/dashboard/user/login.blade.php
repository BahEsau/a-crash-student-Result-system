@extends('dashboard.user.layout.app3')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h2 style="margin-top:30px">User Login</h2>
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <form action="{{route( 'user.dologin') }}" method="POST" autocomplete="off">
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
                {{-- New user? <a href="{{ route('user.register')}}">Register here</a> --}}
              </form>
        </div>
    </div>
</div>
@endsection
