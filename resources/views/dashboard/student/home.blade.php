@extends('dashboard.student.layout.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>
    <div class="container">

        <div class="row justify-content-center">
            <h1 style="margin-top: 20px;">Student Notes</h1>
            {{-- <h3 style="margin-top: 20px;">{{ Auth::user()->first_name . ' ' . Auth::user()->second_name  }}</h3> --}}

            <div class="col-md-16">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                @endif
                <a class="btn btn-success text-light" href="{{ route('student.Download') }}">
                    {{ (' Download PDF') }}
                </a>
                <div class="card" style="margin-top: 20px">
                        <table class="table table-striped table-sm">
                            <thead>
                              <h6 style="margin: 5px;"><b> Name: </b>{{ Auth::user()->first_name . ' ' . Auth::user()->second_name  }}</h6>

                                <tr>
                                    {{-- <th scope="col">No</th> --}}
                                    {{-- <th scope="col " >Student</th> --}}
                                    <th scope="col">Note Type</th>
                                    <th scope="col">Course</th>
                                    <th scope="col ">Note</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($results as $notes)
                                <tr>

                                    {{-- <td>{{ $notes->student->first_name . ' ' . $notes->student->second_name }}
                                    </td> --}}
                                    <td>{{ $notes->note_type }}</td>
                                    <td>{{ $notes->course->name }}</td>
                                    <td>{{ $notes->note }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">

</body>

</html>
@endsection
