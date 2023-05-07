@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            @can('view_posts')
            <h1>List of Posts</h1>

            <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width: 5%" scope="col">#</th>
                        <th style="width: 25%" scope="col">Title</th>
                        <th style="width: 25%" scope="col">Content</th>
                        <th style="width: 25%" scope="col">Created by</th>
                        <th class="text-center" style="width: 20%" scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)

                      <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->User->name }}</td>

                        <td>
                            <div class="d-flex justify-content-between">
                                @can('edit_posts')
                            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endcan

                            @can('destroy_posts')
                            <form method="POST" action="{{ route('posts.delete', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </div>
                            @endcan
                        </td>
                      </tr>
                      @endforeach


                    </tbody>
              </table>
            @endcan
        </div>
    </div>

@endsection
