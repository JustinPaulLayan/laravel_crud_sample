@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> 
                    <div class="float-left">Create Post</div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.update', $post->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$post->title}}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea id="body" name="body" class="form-control @error('body') is-invalid @enderror">{{$post->body}}</textarea>
                            @error('body')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="Submit" class="btn btn-success">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection