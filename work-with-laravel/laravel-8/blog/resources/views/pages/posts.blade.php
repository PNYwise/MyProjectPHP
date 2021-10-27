@extends('layouts/main')
@section('container')
<h2 class="mb-5 text-center">{{ $title }}</h2>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/posts">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">search</button>
            </div>
        </form>
    </div>
</div>

@if ($posts->count())
    <div class="card mb-3">
        @if ($posts[0]->image)
        <div style="max-height: 400px; overflow:hidden;">
            <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="..">    
        </div>
        @else
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
        @endif
        <div class="card-body text-center">
            <h3 class="card-title">
                <a class="text-decoration-none text-dark" href="/post/{{$posts[0]->slug}}">
                <h2>{{ $posts[0]->title }}</h2>
            </a>
            </h3>
            <p>
                <small class="text-muted">
                    By: <a class="text-decoration-none" href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/post/{{$posts[0]->slug}}" class="text-decoration-none btn btn-primary">Read more</a>
        </div>
    </div>    
    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0,0,0,0.7)">
                        <a  class="text-decoration-none text-white" href="/posts?category={{ $post->category->slug }}">
                            {{ $post->category->name }}
                        </a>
                    </div>
                    @if ($post->image)
                    <div style="max-height: 300px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="..">    
                    </div>
                    @else
                        <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-decoration-none text-black" href="/post/{{$post->slug}}">
                                <h4>{{ $post->title }}</h4>
                            </a>
                        </h5>
                        <small class="text-muted mb-1">
                            By: <a class="text-decoration-none mb-1" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                        </small>
                        <p class="card-text">{{ $post->excerpt }} </p>
                        <a href="/post/{{$post->slug}}" class="text-decoration-none btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-center fs-4">No Post Found</p>
@endif    
<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
@endsection