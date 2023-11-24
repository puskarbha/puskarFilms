@extends('layouts.admin')
@section('adminContent')

    <div class="addBranch--form ml-3 mr-3">
        <form method="POST" action="{{route('pushMovie')}}" enctype="multipart/form-data">
            @csrf
            <h2 class="mt-2">Movie Details</h2>
            <div class="mb-3">
                <label for="movieName" class="form-label">movie Name</label>
                <input type="text"  class="form-control" id="movieName" name="name" required>
            </div>
            <div class="mb-3">
                <label for="cast" class="form-label">Cast</label>
                <input type="text" class="form-control" id="cast" name="cast" required>
            </div>

            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" name='director' class="form-control" id="director"  required>
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">language</label>
                <input type="text" class="form-control" id="language" aria-describedby="emailHelp" name="language" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea  class="form-control" id="description" name="description" rows="4" cols="50"></textarea>

            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" aria-describedby="emailHelp" name="thumbnail" required>
                <div class="preview-thumbnail thumbnail ">
                    <img id="preview-thumbnail" src="#"  >
                </div>
                <br><button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <script>
            document.getElementById('preview-thumbnail').addEventListener('change',function(event){
                var preview=document.getElementById('preview-thumbnail');
                preview.src=URL.createObjectURL(event.target.files[0]);
                preview.style.display='block';
            })
        </script>
    </div>
@endsection
