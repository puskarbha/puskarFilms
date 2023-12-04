@extends('layouts.auth')
@section('authContent')
    <style>
        .register--form{
            background-color: rgba(255,255,255,0.4);
            border-radius: 15px;
            padding: 25px;
        }
        .register--form input{
            border-radius: 10px;
            color: white;
            font-family: sans-serif !important;
        }

    </style>
    <div class="card w-50 mx-auto register--form">
        <h2 class="mx-auto">Register Form</h2>
        <div class="card-body">
            <form method="POST" action="{{route('register')}}">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Full Name</label>
                    <input type="text" class="form-control bg-white text-black" id="exampleInputName" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control bg-white text-black" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" >
                    <div id="emailHelp" class="form-label">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control bg-white text-black" id="exampleInputPassword1" name="password">
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label"> Confirm Password</label>
                    <input type="password" class="form-control bg-white text-black" id="confirmPassword" name="password_confirmation">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="submit text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
    </div>

@endsection
