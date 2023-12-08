@extends('layouts.admin')
@section('adminContent')

    <div class="addBranch--form ml-3 mr-3">

        <form action="{{route('halls.update',$hall->id)}}"  method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="">Halls</label>
                <div id="container" class="mx-5 " >

                    Branch Name:
                    <select name="branch_id[]" class="branch-select"  >
                        <option selected disabled>- Select Branch -</option>
                        @foreach($branches as $branch)
                            @if($hall->branch->id== $branch->id)
                            <option value="{{ $branch->id }}" selected>{{ $branch->name }}</option>
                            @else
                                <option value="{{ $branch->id }}" >{{ $branch->name }}</option>
                            @endif

                        @endforeach
                    </select>
                    Hall Name:  <input type="text"  id="halls" name="halls[]" style="width: 100px" value="{{$hall->hall_name}}">
                    Seat Limit: <input type="number"  id="seat_limit" name="seat_limits[]"  style="width: 50px" min="0" value="{{$seatQuantity}}">
                    <br>
                </div>

            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        {{$errors}}
    </div>

@endsection



