import './bootstrap';
import $ from 'jquery';
import 'admin-lte/dist/js/adminlte.min';
import 'admin-lte/plugins/jquery/jquery.min';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min';
import select2 from 'admin-lte/plugins/select2/js/select2.full.min';

import.meta.glob([
    '../img/**'
]);

window.jQuery = window.$ = $;
window.select2 = select2();

// счётчик символов в текстовом поле
const textarea = document.querySelector('textarea.feedback');
const counter = document.querySelector('.current');
const maxlength = 3000;

textarea.addEventListener('input', onInput)

function onInput(event) {
    console.log(event);
    event.target.value = event.target.value.slice(0, maxlength); // обрезаем текст до 4000 символов
    counter.textContent = event.target.value.length;
}
