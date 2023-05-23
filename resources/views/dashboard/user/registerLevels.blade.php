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
            <div class="card border-primary mb-3" style="margin-top: 40px">
                <div class="card-header border-primary mb-3 text-center text-primary " >{{ __('Create Level') }}</div>

                <div class="card-body border-primary mb-3">
                    <form method="POST" action="{{ route('user.createLevels') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="level" class="col-md-4 col-form-label text-md-end">{{ __(' Level Name') }}</label>
                            <div class="col-md-6">
                                <input id="level" type="text" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" required autocomplete="level name" autofocus>

                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Create') }}
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
