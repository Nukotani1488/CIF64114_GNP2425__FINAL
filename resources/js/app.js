import './bootstrap';

import jQuery from 'jquery';
window.$ = jQuery;
$ = window.$;


function sendForm(form, url, successCallback, errorCallback) {
    $.ajax({
        type: 'POST',
        url: url,
        data: form.serialize(),
        success: successCallback, 
        error: errorCallback
    });
}

window.sendForm = sendForm;