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
            <a class="btn btn-primary text-light" href="{{ route('user.viewDetails') }}">
                {{ ('<< Back') }}
            </a>
            <div class="card border-primary mb-3" style="margin-top: 20px">
                <div class="card-header text-center text-primary " ><h4>Update Student Notes/Mark</h4></div>

                <div class="card-body border-primary mb-3">
                    <form method="POST" action="{{ route('user.store', ['id' =>$student_id->id]) }}">
                        @csrf



                        <div class="row mb-3">
                            <label for="student_id" class="col-md-4 col-form-label text-md-end">{{ __('Student Name') }}</label>
                            <div class="col-md-6">
                                <select class="form-select size-auto" name="student_id" aria-label="Default select example">
                                    <option value="{{ $student_id->student->id }}">{{ $student_id->student->first_name.' '.$student_id->student->second_name}}</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->first_name.' '.$student->second_name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="course_id" class="col-md-4 col-form-label text-md-end">{{ __('Course Name') }}</label>
                            <div class="col-md-6">
                                <select class="form-select size-auto" name="course_id" aria-label="Default select example">
                                    <option value="{{ $student_id->course->id }}">{{ $student_id->course->name}}</option>
                                    @foreach($course_ids as $course_id)
                                    <option value="{{ $course_id->id }}">{{ $course_id->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="note_type" class="col-md-4 col-form-label text-md-end">{{ __('Note Type') }}</label>
                            <div class="col-md-6">
                                <select class="form-select size-auto" name="note_type" aria-label="Default select example">
                                    <option value="{{ $student_id->note_type }}">{{ $student_id->note_type }}</option>
                                    <option value="CA">CA</option>
                                    <option value="Exams">Exams</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="note" class="col-md-4 col-form-label text-md-end">{{ __('Note/Mark') }}</label>
                            <div class="col-md-6">

                                <input id="note" type="number" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ $student_id->note }}" required autocomplete="note" autofocus>

                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('+Update') }}
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
