@extends('layouts.admin')
@section('adminContent')

    <div class="addBranch--form ml-3 mr-3">
        <form method="POST" action="{{route('updateBranch',['id'=>$branch->id])}}">
            @csrf
            <h2 class="mt-2">Branch Details</h2>
            <div class="mb-3">
                <label for="branchName" class="form-label">Branch Name</label>
                <input type="text"  class="form-control" id="branchName" name="branchName">
            </div>
            <div class="mb-3">
                <label for="branchAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="branchAddress" name="branchAddress">
            </div>


        </form>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif
    </div>

@endsection
