let WGroupAdmin = function() {

    this.init = function() {
        this.usersFormInit();
        this.userFormInit();
    }

    this.usersFormInit = function() {
        $('#table').DataTable();
    }

    this.userFormInit = function() {
        let birthday_field = $('#birthday');
        $(birthday_field).datetimepicker({
            format: 'DD.MM.YYYY'
        });
    }
}

let adminWGroup = new WGroupAdmin();

$(function() {
    adminWGroup.init();
});
