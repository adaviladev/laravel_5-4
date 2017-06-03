@extends('layouts.master')

@section('content')
    <div class="col-sm-8">
        <h1>Sign In</h1>
        <form action="/login" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" />
            </div>
            <!-- /.form-group -->
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" />
            </div>
            <!-- /.form-group -->
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
            <!-- /.form-group -->

            @include('layouts.errors')

        </form>
    </div>
    <!-- /.col-md-8 -->
@endsection