@extends('dashboard.user.layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body>
        <div class="container">

            <div class="row justify-content-center">
                <h1>Student Notes</h1>

                <div class="col-md-16">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                    @endif
                    <a class="btn btn-primary text-light" href="{{ route('user.home') }}">
                        {{ ('<< Home') }}
                    </a>
                    <div class="card border-primary mb-3" style="margin-top: 20px">
                        {{-- <div class="card-header text-center text-primary ">{{ __('Notes of Student') }}</div> --}}
                        <a class="btn  btn-success btn-sm" style="width: 150px; margin: 6px;" href="{{ route('user.registerNotes') }}"> Add new Notes</a>
                        <div class="table-responsive">

                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Note Type</th>
                                        <th scope="col">Course</th>
                                        <th scope="col " >Student</th>
                                        <th scope="col ">Note</th>
                                        <th scope="col " style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($notes as $notes)
                                    <tr>
                                        <td>{{ $notes->id }}</td>
                                        <td>{{ $notes->note_type }}</td>
                                        <td>{{ $notes->course->name }}</td>
                                        <td>{{ $notes->student->first_name . ' ' . $notes->student->second_name }}
                                        </td>
                                        <td>{{ $notes->note }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center"><a href="{{ route('user.showNotes', ['id'=>$notes->student_id]) }}"
                                                    class="btn  btn-primary btn-sm">
                                                    view</a>
                                            <div class="d-flex justify-content-center"> <a
                                                    href="{{route('user.update', ['id'=>$notes->id])}}" class="btn  btn-info btn-sm">
                                                    Update</a>
                                                <a href="{{route('user.Delete', ['id'=>$notes->id])}}"
                                                    class="btn  btn-danger btn-sm"> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">

    </body>

    </html>
@endsection
