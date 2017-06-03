@extends('layouts.master')

@section('content')
    <div class="col-sm-8">

        <h1>Create a post</h1>

        <form method="post" action="/posts">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Publish</button>
            </div>
            <!-- /.form-group -->

            @include( 'layouts.errors' )

        </form>

    </div>
    <!-- /.col-sm-8 -->
@endsection