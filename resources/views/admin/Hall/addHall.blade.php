@extends('layouts.admin')
@section('adminContent')

@dd(Breadcrumbs::render())
    <div class="addBranch--form ml-3 mr-3">

        <form action="{{route('halls.store')}}"  method="post" id="contactUSForm">
            @csrf
            <div class="mb-3">
                <label for="">Halls</label>
                <div id="container" class="mx-5 " >
                    Branch Name:
                    <select name="branch_id[]" class="branch-select"  >
                        <option selected disabled>- Select Branch -</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                    Hall Name:  <input type="text"  id="halls" name="halls[]" style="width: 100px">
                    Seat Limit: <input type="number"  id="seat_limit" name="seat_limits[]"  style="width: 50px" min="0"> <br>
                </div>
                <a href="#" id="filldetails" class="btn btn-primary mt-2 mx-5" onclick="addFields()">
                    Add hall
                    <i class="fa-solid fa-circle-plus" style="color: #99c1f1;"></i>
                </a>
            </div>
            @if ($errors->has('g-recaptcha-response'))
            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
        @endif
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        {{$errors}}
    </div>
    <script type='text/javascript'>
        function addFields() {


            var container = document.getElementById("container");


            var branchSelect = container.querySelector('.branch-select').cloneNode(true);
            container.appendChild(document.createTextNode(" Branch Name: "));
            container.appendChild(branchSelect);

            container.appendChild(document.createTextNode(" Hall Name: "));
            var input = document.createElement("input");
            input.type = "text";
            input.name = "hall[]";
            input.style.width = "100px";
            container.appendChild(input);


            container.appendChild(document.createTextNode(" Seat Limit: "));
            var sl_input = document.createElement("input");
            sl_input.type = "number";
            sl_input.name = "seat_limits[]";
            sl_input.min="0";
            sl_input.style.width = "50px";

            container.appendChild(sl_input);
            container.appendChild(document.createElement("br"));
        }



        $('#contactUSForm').submit(function(event) {
        event.preventDefault();

        grecaptcha.ready(function() {
            grecaptcha.execute("{{ env('GOOGLE_RECAPTCHA_KEY') }}", {action: 'subscribe_newsletter'}).then(function(token) {
                $('#contactUSForm').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                $('#contactUSForm').unbind('submit').submit();
            });;
        });
    });
    </script>
@endsection
