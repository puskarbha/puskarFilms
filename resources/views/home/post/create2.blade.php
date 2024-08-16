<html>
        <head>
            <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="http://cdn.ckeditor.com/4.5.4/standard/ckeditor.js"></script>
        </head>
        <body>
            <div class="row hide_mail_id_domain">
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Option</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <textarea class="ckeditor" required="" name="question_option_1" ></textarea>
                                    {{-- <textarea class="ckeditor" required="" name="question_option_1" ></textarea>
                                    <textarea class="ckeditor" required="" name="question_option_1" ></textarea> --}}
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="javascript:void(0)" class="btn btn-success add_more right" style="float: right;">Add More</a>
                </div>
            </div>
            <script>
                var REMOVE = '';
                var i=1;
                $(document).ready(function () {
                    $('.add_more').click(function () {
                        var oneplus=i+1;
                        var tr_object = $('tbody').find('tr:first').clone();
                        // getting and renaming existing textarea by name.
                        $(tr_object).find('textarea[name="question_option_1"]').attr("name", "question_option_"+oneplus+"");
                        $(tr_object).find('input').val('');
                        $(tr_object).find('td:last').html('<a href="javascript:void(0)" class="btn btn-danger remove_more">Remove</a>');
                        $('tbody').append(tr_object);
                        //replace code
                        CKEDITOR.replace("question_option_"+oneplus+"");
                        // when i were clicking on add more during my testing , then extra cke-editor id also appending to DOM. so for removing other then first
                        // included below code
                        $('#cke_question_option_1').each(function() {
                            var $ids = $('[id=' + this.id + ']');
                            if ($ids.length > 1) {
                                $ids.not(':first').remove();
                            }
                        });
                        i=i+1;
                        oneplus++;
                    });
                    $(document).on('click', '.remove_more', function () {
                        var id = $(this).closest('tr').find('.id').val();
                        if (id != '') {
                            if (REMOVE != '') {
                                REMOVE = REMOVE + ',' + id;
                            } else {
                                REMOVE = id;
                            }
                            $('#id').val(REMOVE);
                        }
                        $(this).closest('tr').remove();
                    });
                });
            </script>
        </body>
    </html>
