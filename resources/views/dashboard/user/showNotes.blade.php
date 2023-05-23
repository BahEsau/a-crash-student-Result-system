
{{-- @extends('dashboard.user.layout.app')

@section('content') --}}
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

                <div class="col-md-16">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                    @endif
                    <a class="btn btn-primary text-light" href="{{ route('user.viewDetails') }}">
                        {{ ('<< Back') }}
                    </a>
                    <div class="card border-primary mb-3" style="margin-top: 20px">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">No</th> --}}
                                        <th scope="col " >Student</th>
                                        <th scope="col">Note Type</th>
                                        <th scope="col">Course</th>
                                        <th scope="col ">Note</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($results as $notes)
                                    <tr>
                                        {{-- <td>{{ $notes->id }}</td> --}}
                                        <td>{{ $notes->student->first_name . ' ' . $notes->student->second_name }}
                                        </td>
                                        <td>{{ $notes->note_type }}</td>
                                        <td>{{ $notes->course->name }}</td>
                                        <td>{{ $notes->note }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body border-primary mb-3">

    </body>

    </html>
{{-- @endsection --}}
