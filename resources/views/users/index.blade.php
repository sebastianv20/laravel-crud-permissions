@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @can('view_users')

            <div class="d-flex justify-content-center mb-2">
                <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
            </div>


            <h1>List of Users</h1>

            <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width: 5%" scope="col">#</th>
                        <th style="width: 25%" scope="col">Name</th>
                        <th style="width: 25%" scope="col">Email</th>
                        <th style="width: 25%" scope="col">Rol</th>
                        <th class="text-center" style="width: 20%" scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                      <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->Role->first()->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                      </tr>
                      @endforeach


                    </tbody>
              </table>
            @endcan
        </div>
    </div>

@endsection
