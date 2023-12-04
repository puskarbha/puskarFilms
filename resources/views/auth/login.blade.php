@extends('layouts.auth')

@section('authContent')
    <style>
        .login--form{
            background-color: rgba(255,255,255,0.4);
            border-radius: 15px;
            padding: 25px;
        }
        .login--form input{
            border-radius: 10px;
            color: white;
           font-family: sans-serif;
        }

    </style>
<div class="card w-50 mx-auto login--form">
        <h2 class="mx-auto">Login Form</h2>
    <div class="card-body">
        <form method="post" action="{{ route('login') }}" class="needs-validation" novalidate>
            @csrf


            <div class="mb-3">

                <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="email"
                       placeholder="Email address"
                       required >
                <div class="invalid-feedback">
                    Please enter a valid email.
                </div>
            </div>

            <div class="mb-3 ">

                <input type="password" class="form-control "  placeholder="Password" id="exampleInputPassword1" name="password" required >
                <div class="invalid-feedback">
                    Please enter your password.
                </div>
            </div>

            <div class="mb-3 form-check mx-auto">

                <label class="form-check-label" for="rememberMe">Remember me
                    <input type="checkbox" class="form-check-input   " id="rememberMe" name="remember">
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-50">Login</button>
            </div>

        </form>
        @if($errors->any())
            <div class="mt-3 alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

@endsection
