@extends('layouts.admin')
@section('adminContent')
    <div class="container">

        <h2>Theater Hall List</h2>

        <div class="add--branch text-right mb-2">
            <a class="btn btn-primary" href="{{ route('halls.create') }}">
                <i class="nav-icon far fa-plus-square"></i>
                Add Hall
            </a>
        </div>

        @if($halls->count() > 0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($halls as $hall)
                    <tr>
                        <td>{{ $hall->id }}</td>
                        <td>{{ $hall->hall_name }}</td>
                        <td>{{$hall->branch->name}}</td>

                        <td>
                            <a href="{{ route('halls.edit',$hall->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('halls.destroy',$hall->id)}}" method="post">
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
                {!! $halls->links() !!}
            </div>
        @else
            <h1>No data Found</h1>
        @endif

    </div>
@endsection
