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
            <div class="card  border-primary mb-3" style="margin-top: 40px">
                <div class="card-header border-primary text-center text-primary "><h4>Create Courses</h4></div>

                <div class="card-body  border-success mb-3">
                    <form method="POST" action="{{ route('user.createCourses') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __(' course title') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="course name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="course_code" class="col-md-4 col-form-label text-md-end">{{ __('Course code') }}</label>
                            <div class="col-md-6">
                                <input id="course_code" type="text" class="form-control @error('course_code') is-invalid @enderror" name="course_code" value="{{ old('course_code') }}" required autocomplete="course code" autofocus>

                                @error('course_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description ') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('email') }}" required autocomplete="description">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="semester" class="col-md-4 col-form-label text-md-end">{{ __('semester') }}</label>

                            <div class="col-md-6">
                                <input id="semester" type="text" class="form-control @error('semester') is-invalid @enderror" name="semester" required autocomplete="semester">

                                @error('semester')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="levels_id" class="col-md-4 col-form-label text-md-end">{{ __('level_id') }}</label>
                            <div class="col-md-6">
                                <select class="form-select size-auto" name="level_id" aria-label="Default select example">
                                    @foreach($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('+Create') }}
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
