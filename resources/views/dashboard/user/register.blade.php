@extends('dashboard.user.layout.app3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <a class="btn btn-primary text-light" href="{{ route('user.home') }}">
                {{ ('<< Home') }}
            </a>
            <h2 style="margin-top:30px">User Registration</h2>
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('error'))

            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <form action="{{route( 'user.create') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Full name</label><br>
                    <input type="text" class="form-control" name="name" id="name" placeholder="enter full name" value="{{ old('name') }}">
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                </div>

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

                <div class="mb-3">
                  <label for="cpassword" class="form-label">Confirm Password</label><br>
                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="re-enter password ">
                    <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

              </form>
        </div>
    </div>
</div>

</body>
</html>
@endsection
