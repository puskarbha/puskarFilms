@extends('layouts.admin')
@section('adminContent')
    <div class="container">

        <h2>Theater Branch Table</h2>

        <div class="add--branch">
            <a href="{{ route('addBranch') }}">
                <i class="nav-icon far fa-plus-square"></i>
                Add Branch
            </a>
        </div>

        @if($branches->count() > 0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Manager Name</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($branches as $branch)
                    <tr>
                        <td>{{ $branch->id }}</td>
                        @foreach($users as $user)
                            @if($branch->manager_id==$user->id)
                            <td>{{$user->name}}</td>
                            @endif
                        @endforeach

                        <td>{{ $branch->name }}</td>
                        <td>{{ $branch->address }}</td>
                        <td>
                            <a href="{{ route('editBranch', ['id' => $branch->id]) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('deleteBranch', ['id' => $branch->id]) }}" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h1>No data Found</h1>
        @endif

    </div>
@endsection
