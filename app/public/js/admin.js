let WGroupAdmin = function() {

    this.init = function() {
        this.userFormInit();
        this.formsInit();
        this.postEditorInit();
        bsCustomFileInput.init();
    }

    this.formsInit = function() {
        let _this = this;
        $('#table').DataTable();
        $('input.form-control').change(function() {
            _this.formsValidate(this);
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
            if($(inputEl).val() === '') $(inputEl).addClass('is-invalid');
            else $(inputEl).removeClass('is-invalid');
        }
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
