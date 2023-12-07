@extends('layouts.admin')
@section('adminContent')

<div class="addBranch--form ml-3 mr-3">
    <form method="POST" action="{{route('branches.store')}}">
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
        <div class="mb-3">
            <label for="">Halls </label>
            <div id="container" class="mx-5">
                Hall Name:  <input type="text"  id="halls" name="halls[]">
                Seat Limit: <input type="number"  id="seat_limit" name="seat_limits[]"> <br>
            </div>

            <a href="#" id="filldetails" class="btn btn-primary mt-2 mx-5" onclick="addFields()">
            Add hall
            <i class="fa-solid fa-circle-plus" style="color: #99c1f1;"></i>
             </a>
        </div>
        <h2>Setup Login Details for Branch Manager</h2>
        <div class="mb-3">
            <label for="userName" class="form-label">Name</label>
            <input type="text" name='userName' class="form-control" id="userName" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="userEmail">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="userPassword">
        </div>


        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
</div>
<script type='text/javascript'>
    function addFields(){

        var container = document.getElementById("container");

            container.appendChild(document.createTextNode("Hall Name: " ));
            var input = document.createElement("input");
            input.type = "text";
            input.name = "halls[]";

            container.appendChild(input);

            container.appendChild(document.createTextNode(" Seat Limit: "));

            var sl_input = document.createElement("input");
            sl_input.type = "number";
            sl_input.name = "seat_limits[]";

            container.appendChild(sl_input);
            container.appendChild(document.createElement("br"));

    }
</script>
@endsection
