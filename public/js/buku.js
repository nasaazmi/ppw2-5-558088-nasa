$(document).ready(function () {
    $('#tgl_terbit').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
        todayHighlight: true,
        container: '#kalender'
    });
});