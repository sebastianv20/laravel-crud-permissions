@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="text-center mt-2 mb-4">New Role</h2>


            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                    <div class="col-md-4">
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                            name="name" required autocomplete="name" value="">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>

                        @enderror
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">
                            New Role
                        </button>
                    </div>
                </div>

                <h2>List of Permissions</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-left" style="width: 25%" scope="col">Permission</th>
                            <th class="text-center" style="width: 20%" scope="col">Select</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>

                            <td class="text-center">


                                <div class="row checkbox-row">
                                    <div class="col-xs-2 col-xs-offset-4">
                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                            value="{{ $permission->id }}">
                                    </div>
                                </div>

                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>

            </form>

        </div>
    </div>

    @endsection
