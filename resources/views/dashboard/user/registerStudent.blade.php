@extends('dashboard.user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('success'))
            <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
            @endif
                @if(Session::has('error'))
            <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
            @endif
            <a class="btn btn-primary text-light" href="{{ route('user.home') }}">
                {{ ('<< Home') }}
            </a>
        </a>
        <h2 style="margin-top:30px">Student Registration</h2>
            <div class="card border-primary mb-3" style="margin-top: 20px">
                <div class="card-header text-center text-primary  border-primary mb-3" ><h4>Register Student</h4></div>
                <div class="card-body border-primary mb-3">
                    <form method="POST" action="{{ route('user.createStudent') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="second_name" class="col-md-4 col-form-label text-md-end">{{ __('Second Name') }}</label>
                            <div class="col-md-6">
                                <input id="second_name" type="text" class="form-control @error('second_name') is-invalid @enderror" name="second_name" value="{{ old('second_name') }}" required autocomplete="Second name" autofocus>

                                @error('second_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <select class="form-select size-auto" name="gender" aria-label="Default select example">
                                    @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->gender}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>
                            <div class="col-md-6">
                                <select class="form-select size-auto" name="user_id" aria-label="Default select example">
                                    @foreach($user_ids as $user_id)
                                    <option value="{{ $user_id->id }}">{{ $user_id->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="student_level" class="col-md-4 col-form-label text-md-end">{{ __('Student level') }}</label>
                            <div class="col-md-6">
                                <select class="form-select size-auto" name="student_level" aria-label="Default select example">
                                    @foreach($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cpassword" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="cpassword" type="password" class="form-control" name="cpassword" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('+Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
