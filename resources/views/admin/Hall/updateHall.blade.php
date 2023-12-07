<form action="{{route('halls.update',$branch->id)}}"  method="Post">
    <div class="mb-3">
        <label for="">Halls</label>
        <div id="container" class="mx-5">
            @if ($branch->halls)
                @foreach ($branch->halls as $hall)
                    <div class="row">
                        Hall Name: {{$hall->hall_name}}
                        <form action="{{route('halls.destroy',$hall->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
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


