@extends('layouts.admin')
@section('adminContent')

<div class="addBranch--form ml-3 mr-3">
    <form method="POST" action="{{route('pushBranch')}}">
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

        <h2>Setup Login Details for Branch Manager</h2>
        <div class="mb-3">
            <label for="userName" class="form-label">Name</label>
            <input type="text" name='userName' class="form-control" id="userName" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="userEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="userEmail">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="userPassword">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
</div>

@endsection
