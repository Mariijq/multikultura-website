import "./libs/lexxy";

import Alpine from 'alpinejs';

import $ from 'jquery';

window.$ = $;
window.jQuery = $;

import 'laravel-datatables-vite';

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

import Swal from 'sweetalert2';
window.Swal = Swal;

window.toastr = toastr;

toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: "toast-top-right",
    timeOut: "5000",
    extendedTimeOut: "10000",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    showDuration: "300",
    hideDuration: "1000"
};

window.Alpine = Alpine;
Alpine.start();
