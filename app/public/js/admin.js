let WGroupAdmin = function() {

    this.init = function() {
        this.usersFormInit();
        this.userFormInit();
    }

    this.usersFormInit = function() {
        let _this = this;
        $('#table').DataTable();
        $('#user_form').find('input.form-control').change(function() {
            _this.userFormValidate(this);
        });
    }

    this.userFormInit = function() {
        let birthday_field = $('#birthday');
        $(birthday_field).datetimepicker({
            format: 'DD.MM.YYYY'
        });
    }

    this.userFormValidate = function(inputEl) {
        if($(inputEl).hasClass('required')) {
            if($(inputEl).val() === '') $(inputEl).addClass('is-invalid');
            else $(inputEl).removeClass('is-invalid');
        }
    }
}

let adminWGroup = new WGroupAdmin();

$(function() {
    adminWGroup.init();
});
