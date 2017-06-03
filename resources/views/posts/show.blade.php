@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        <h1>{{ $post->title }}</h1>

        {{ $post->body }}

        <hr>

        <div class="comments">
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>{{ $comment->created_at->diffForHumans() }}: </strong>&nbsp;
                        {{ $comment->body }}
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- /.comments -->

        {{-- Add a comment --}}
        <hr>

        <div class="card">
            <div class="card-block">
                <form method="post" action="/posts/{{$post->id}}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" id="body" placeholder="Your comment here." class="form-control" required></textarea>
                        <!-- /#body -->
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Add Comment</button>
                    </div>
                </form>

                @include('layouts.errors')
            </div>
            <!-- /.card-block -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col-md-8 -->
@endsection