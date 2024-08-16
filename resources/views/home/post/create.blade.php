<!doctype html>
<html lang="en">

<head>
    <title>CKEditor Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
</head>

<body>
    {{ $errors }}
    <div class="container mt-5">
        <form id="postForm" action="{{ route('Posts.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12 m-auto">
                    <div class="card shadow mt-3" id="parentContainer">
                        <div class="card-header">
                            <h4 class="card-title"> Create Post
                                <span style="float: right;">
                                    <button type="button" class="btn btn-danger deleteButton">Delete -</button>
                                </span>
                            </h4>

                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="form-group">
                                    <label> Title </label>

                                    <input type="text" class="form-control" name="title[]"
                                        placeholder="Enter the Title">
                                </div>
                                <div class="form-group">
                                    <label> Body </label>
                                    <textarea name="content[]" class="editor" id="content" placeholder="Body content goes here"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="child-container"></div>
                    <button type="button" class="btn btn-primary addPost">Add +</button>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success mt-5 mx-auto">Submit</button>

            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    {{-- <script>
        ClassicEditor
            .create($('#content')[0])
            .catch(error => {
                console.error(error);
            });

        var $i = 1;
        $('.addPost').on('click', function() {
            $('.editor').each(function(index) {
                $(this).attr('id', `content${$i}`);
            });

            var cloned = $('#parentContainer').clone(true);
            cloned.find('input').val('');
            cloned.attr('id', `childContainer${$i}`);
            $('.child-container').append(cloned);

            $('.editor').each(function() {
                var currentId = $(this).attr('id');
                var nextSibling = $(this).next(); // Get the next sibling element
                if (nextSibling.length) {
                    nextSibling.remove(); // Remove the next sibling element
                }
                ClassicEditor.create($(this)[0]);
            });

            $i++;
        });
    </script> --}}

{{-- 
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });

        var $i = 1;
        $('.addPost').on('click', function() {
            var cloned = $('#parentContainer').clone(true);
            cloned.find('input').val('');
            var editor = cloned.find('.editor'); // Select the editor inside the cloned element
            var nextSibling = editor.next(); // Get the next sibling element
            if (nextSibling.length) {
                nextSibling.remove(); // Remove the next sibling element
            }
console.log(editor);

            var editorId=editor.getAttribute(id);

            cloned.attr('id', `childContainer${$i}`);
            $('.child-container').append(cloned);
            ClassicEditor.create(editorId);

            // var allEditors = document.querySelectorAll('.editor');
            // for (var i = 0; i < allEditors.length; ++i) {

            //     var currentId = this.getAttribute('id');
            //     if (currentId != 'content') {
            //     ClassicEditor.create(allEditors[i]);
            //     }
            // }


            $i++;
        });
    </script> --}}

    {{-- <script>
    ClassicEditor
    .create($('#content')[0])
    .catch(error => {
        console.error(error);
    });

var $i = 1;
$('.addPost').on('click', function() {
    var cloned = $('#parentContainer').clone(true);
    cloned.find('input').val('');
    cloned.find('.editor').each(function() {
        var currentId = `content${$i}`; // Define currentId within the loop
        if ($(this).attr('id') !== 'content') {
            var nextSibling = $(this).next(); // Get the next sibling element
            if (nextSibling.length) {
                nextSibling.remove(); // Remove the next sibling element
            }
            $(this).attr('id', currentId);
            // Create CKEditor instance for the current editor
            ClassicEditor
                .create($(this)[0]) // Pass the raw DOM element of the editor to create CKEditor instance
                .catch(error => {
                    console.error(error);
                });
        }
    });
    cloned.attr('id', `childContainer${$i}`);
    $('.child-container').append(cloned);
    $i++;
});

</script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
