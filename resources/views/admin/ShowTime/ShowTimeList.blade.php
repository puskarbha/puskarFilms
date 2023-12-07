@extends('layouts.admin')
@section('adminContent')
    <div class="container">

        <h2 class="p-3 text-center"> ShowTime List:</h2>

        <div class="add--schedule text-right mb-2 ">
            <a class="btn btn-primary" href="{{ route('show_times.create') }}">
                <i class="nav-icon far fa-plus-square"></i>
                Add ShowTime

            </a>
        </div>

        @if($show_times->count() > 0)
            <div class="table-responsive">
            <table class="table  table-striped table-hover">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Movie</th>
                        <th>Branch</th>
                        <th>Hall</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($show_times as $show_time)
                        <tr>
                            <td>{{ $show_time->id }}</td>
                            <td>{{ $show_time->movie->name }}</td>
                            <td>{{ $show_time->hall->branch->name}}</td>
                            <td>{{ $show_time->hall->hall_name}}</td>
                            <td>{{$show_time->date}}</td>
                            <td>{{$show_time->time}}</td>
                            <td>{{ $show_time->status }}</td>
                            <td>
                                <a href="{{ route('show_times.edit', $show_time->id) }}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('show_times.destroy', $show_time->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>


            </table>
            </div>
            <div class="d-flex">
                {!! $show_times->links() !!}
            </div>
        @else
            <h1>No data Found</h1>
        @endif

    </div>
@endsection
