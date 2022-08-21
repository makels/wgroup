let WGroupAdmin = function() {

    this.init = function() {
        this.userFormInit();
        this.formsInit();
        this.postTableInit();
        this.postEditorInit();
        this.postFilterInit();
        bsCustomFileInput.init();
    }

    this.formsInit = function() {
        let _this = this;
        $('#table').DataTable();
        $('input.form-control').change(function() {
            _this.formsValidate(this);
        });
    }

    this.postTableInit = function() {
        var colCount = $('#posts_table thead tr th').length;
        $('#posts_table thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#posts_table thead');

        $('#posts_table').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            order: [colCount - 1, 'desc'],
            initComplete: function () {
                var api = this.api();

                api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        var filter_id = typeof($(cell).attr('filter_id')) !== 'undefined' ? (' id="' + $(cell).attr('filter_id') + '" ') : '';
                        $(cell).html('<input ' + filter_id + ' type="text" placeholder="' + title + '" />');

                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    }

    this.postFilterInit = function() {
        $('#select_status_filter').change(function() {
            $('#post_status_filter_id').val($(this).val());
            $('#post_status_filter_id').trigger('change');
        });

        $('#select_type_filter').change(function() {
            $('#post_type_filter_id').val($(this).val());
            $('#post_type_filter_id').trigger('change');
        });
    }

    this.userFormInit = function() {
        $('#birthday').datetimepicker({
            format: 'DD.MM.YYYY'
        });
    }

    this.PostFormInit = function() {
        $('#create-post-calendar').datetimepicker({
            format: 'DD.MM.YYYY'
        });
        $('#updated-post-calendar').datetimepicker({
            format: 'DD.MM.YYYY'
        });
    }

    this.formsValidate = function(inputEl) {
        if($(inputEl).hasClass('required')) {
            if($(inputEl).val() === '') {
                $(inputEl).addClass('is-invalid');
                return false;
            } else {
                $(inputEl).removeClass('is-invalid');
            }
        }
        return true;
    }

    this.formValidate = function(form) {
        var _this = this;
        var errors = false;
        $(form).find('input').each(function(index, el) {
            if(_this.formsValidate(el) === false) {
                errors = true;
            }
        });
        return !errors;
    }

    this.postEditorInit = function() {
        $('#summernote').summernote({
            height: 475
        });
    }

    this.uploadPostImage = function() {
        var data = new FormData();
        data.append("_token", $("input[name=_token]").val());
        data.append("file", $('#postInputFile')[0].files[0]);
        $.ajax({
            url: '/admin/post/upload',
            type: 'post',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if(Number(response.res) === 0) {
                    $('.post-image-preview').find('img').attr('src', '/upload/' + response.file);
                    $('#post_data_image').val(response.file);
                }
            }
        });
    }

}

let adminWGroup = new WGroupAdmin();

$(function() {
    adminWGroup.init();
});
