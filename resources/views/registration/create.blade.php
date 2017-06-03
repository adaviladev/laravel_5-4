@extends('layouts.master')

@section('content')
    <div class="col-sm-8">
        <h1>Register</h1>
        <form action="/register" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required/>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required/>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required/>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required/>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <!-- /.form-group -->

            @include('layouts.errors')

        </form>
    </div>
    <!-- /.col-sm-8 -->
@endsection