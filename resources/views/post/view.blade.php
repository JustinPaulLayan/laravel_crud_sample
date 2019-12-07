@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}  
                    </div><br />
                @endif
                <div class="card-body">
                    <div class="container">

                        <div>

                            <h1 class="mt-4">{{$post->title}}</h1>

                            <p class="lead">
                                by
                                <a href="#">{{$post->user->name}}</a>
                            </p>

                            <hr>

                            <p>Posted on {{$post->created_at}}</p>

                            <hr>

                            {{$post->body}}

                            <hr>

                            <div class="card my-4">
                                <h5 class="card-header">Leave a Comment:</h5>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('comment.store') }}">
                                        @csrf
                                            <input id="post_id" type="text" name="post_id" value="{{$post->id}}" hidden>
                                        <div class="form-group">
                                            <label for="comment">Body</label>
                                            <textarea id="comment" name="comment" class="form-control @error('comment') is-invalid @enderror"></textarea>
                                            @error('comment')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                            @foreach($post->comments as $comment)
                            <div class="media mb-4">
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">{{$post->user->name}}</h5>
                                    {{$comment->created_at}}<br>
                                    <hr>
                                        <p>{{$comment->comment}}</p>
                                    <hr>
                                    <a href="{{route('comment.destroy', $comment->id)}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-comment').submit();">
                                        Delete Comment
                                    </a>

                                    <form id="delete-comment" action="{{route('comment.destroy', $comment->id)}}" method="post" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection