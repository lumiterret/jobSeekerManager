import './bootstrap';
import $ from 'jquery';
import 'admin-lte/dist/js/adminlte.min';
import 'admin-lte/plugins/jquery/jquery.min';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min';
import.meta.glob([
    '../img/**'
]);

$(document).ready(function() {
    $("#toggle-button").click(function() {
        $("#add-info").toggleClass('d-none');
    });
});
