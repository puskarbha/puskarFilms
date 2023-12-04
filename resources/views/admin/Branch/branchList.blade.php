@extends('layouts.admin')
@section('adminContent')
    <div class="container">

        <h2>Theater Branch Table</h2>

        <div class="add--branch text-right mb-2">
            <a class="btn btn-primary" href="{{ route('branches.create') }}">
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

                        <td>{{$branch->manager->name}}</td>


                        <td>{{ $branch->name }}</td>
                        <td>{{ $branch->address }}</td>
                        <td>
                            <a href="{{ route('branches.edit',$branch->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('branches.destroy',$branch->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex">
                {!! $branches->links() !!}
            </div>
        @else
            <h1>No data Found</h1>
        @endif

    </div>
@endsection
