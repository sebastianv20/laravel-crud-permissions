

@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="text-center mt-2 mb-4">Edit Post: #{{ $post->id }}</h1>

            <form method="POST" action="{{ route('posts.update',$post->id) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title" value="{{ $post->title }}">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="content" class="col-md-4 col-form-label text-md-end">Content</label>

                    <div class="col-md-6">
                        <input id="content" type="content" class="form-control @error('content') is-invalid @enderror" name="content" required autocomplete="content" value="{{ $post->content }}">

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                        Edit Post
                        </button>
                    </div>
                </div>
            </form>





        </div>
    </div>

@endsection




