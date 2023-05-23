@extends('dashboard.user.layout.app')

@section('content')
    <body>
        <div class="container">
            <div class="row justify-content-center my-50">
                <h1 style="margin-top:20px;">User Dashboard</h1>
                <div class="col-md-8">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                    @endif
                    <table>
                        <tr>

                            <td><a class="btn btn-success" style="width: 200px; font-size: 20px; margin-right: 50px;" href="{{ route('user.registerStudent') }}">create student</a></td>

                            <td><a class="btn btn-success" style="width: 200px; font-size: 20px; margin-right: 50px;" href="{{ route('user.registerNotes') }}">create Note</a></td>
                        </tr><br>

                        <tr>
                            <td><a class="btn btn-success" style="width: 200px; font-size: 20px; margin-right: 50px;" href="{{ route('user.showLevels') }}">create courses</a></td>

                            <td><a class="btn btn-success" style="width: 200px; font-size: 20px; margin-right: 50px;" href="{{ route('user.registerLevels') }}">create levels</a></td>
                        </tr>

                        <tr>
                            <td><a class="btn btn-success" style="width: 200px; font-size: 20px; margin-right: 50px;" href="{{ route('user.registerNotes') }}">create Note</a></td>

                            <td><a class="btn btn-success" style="width: 200px; font-size: 20px; margin-right: 50px;" href="{{ route('user.register') }}">create user</a></td>

                        </tr>

                        <tr>
                            <td><a class="btn btn-info" style="width: 200px; font-size: 20px; margin-right: 50px;" href="{{ route('user.viewDetails') }}">view notes</a></td>

                            {{-- <td> <a class="btn btn-primary"  href="{{ route('user.logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{ route('user.logout') }}" method="POST" id="logout-form">
                                    @csrf
                                </form> --}}

                        </tr>
                    </table>
                </div>
            </div>
        </div>






        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
            integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
        </script>

    </body>

    </html>
@endsection
