@extends('layouts.admin')
@section('adminContent')

<div class="addBranch--form ml-3 mr-3">
    <form method="POST" action="{{ route('branches.update', $branch->id) }}">
        @csrf
        @method('PUT')
        <h2 class="mt-2">Branch Details</h2>
        <div class="mb-3">
            <label for="branchName" class="form-label">Branch Name</label>
            <input type="text" class="form-control" id="branchName" name="branchName" value="{{ $branch->name }}">
        </div>
        <div class="mb-3">
            <label for="branchAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="branchAddress" name="branchAddress"
                value="{{ $branch->address }}"
            >
        </div>
        <div class="mb-3">
            <label for="">Halls</label>
            <div id="container" class="mx-5">
                @if ($branch->halls)
                    @foreach (json_decode($branch->halls, true) as $hall)
                        Hall Name: <input type="text" class="form-control" id="halls" name="hall[]" value="{{ $hall }}">
                        <br>
                    @endforeach
                @endif
            </div>
            <a href="#" id="filldetails" class="btn btn-primary mt-2 mx-5" onclick="addFields()">
                Add hall
                <i class="fa-solid fa-circle-plus" style="color: #99c1f1;"></i>
            </a>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

<script type='text/javascript'>
    function addFields() {
        var container = document.getElementById("container");

        container.appendChild(document.createTextNode("Hall Name:"));

        var input = document.createElement("input");
        input.type = "text";
        input.name = "hall[]";
        input.className = "form-control";
        container.appendChild(input);
        container.appendChild(document.createElement("br"));
    }
</script>

@endsection