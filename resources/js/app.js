import './bootstrap';
import $ from 'jquery';
import 'admin-lte/dist/js/adminlte.min';
import 'admin-lte/plugins/jquery/jquery.min';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min';
import select2 from 'admin-lte/plugins/select2/js/select2.full.min';
import EasyMDE from "easymde";

import.meta.glob([
    '../img/**'
]);

window.jQuery = window.$ = $;
window.select2 = select2();

$(document).ready(function () {
    // editor for feedback
    $('textarea.feedback').each(el => new EasyMDE({
        element: el,
        spellChecker: false,
        toolbar: [
            "bold",
            "italic",
            "heading",
            "|",
            "quote",
            "unordered-list",
            "ordered-list",
            "link",
            "preview",
            "|",
            "guide"
        ]
        })
    );
});
