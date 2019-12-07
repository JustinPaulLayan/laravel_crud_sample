@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> 
                    <div class="float-left">My Posts</div>
                    <div class="float-right"><a href="{{ route('post.create') }}" type="button" class="btn btn-primary text-light">Create Post</a></div>
                </div>

                <div class="card-body">
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                        {{ session()->get('success') }}  
                        </div><br />
                    @endif

                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td><h2>{{ $post->title }}</h2>
                                    <br>Date & Time Posted: <code>{{ $post->created_at }}</code></td>
                                    <td class="d-flex flex-row-reverse"> 
                                        <form action="{{ route('post.destroy', $post->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger btn-group" type="submit">Delete</button>
                                        </form>
                                        <a href="{{ route('post.edit', $post->id)}}" class="btn btn-sm btn-info btn-group" style="margin-right: 5px">Edit</a>
                                        <a href="{{ route('post.view', $post->id)}}" class="btn btn-sm btn-success btn-group" style="margin-right: 5px">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection