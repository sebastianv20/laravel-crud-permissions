@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="d-flex justify-content-center mb-2">
                <a href="{{ route('roles.create') }}" class="btn btn-success">Add Role</a>
            </div>

            <h1>List of Roles</h1>


            <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width: 5%" scope="col">#</th>
                        <th style="width: 25%" scope="col">Name</th>
                        <th class="text-center" style="width: 25%" scope="col">Permissions</th>
                        <th class="text-center" style="width: 20%" scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                      <tr>
                        <th scope="row">{{ $role->id }}</th>
                        <td>{{ $role->name }}</td>
                        <td class="text-center">{{ $role->permissions_count }}</td>
                        <td class="text-center">
                            <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                      </tr>
                      @endforeach


                    </tbody>
              </table>

        </div>
    </div>

@endsection
