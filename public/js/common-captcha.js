// public/js/common-captcha.js
function reloadCaptcha(baseUrl = '') {
    const url = baseUrl ? baseUrl + '/reload-captcha' : '/reload-captcha';

    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            $(".captcha span").html(data.captcha);
        },
        error: function () {
            console.error("Failed to reload CAPTCHA.");
        }
    });
}

// Auto-bind default reload button
$(document).on('click', '#reload', function () {
    reloadCaptcha();
});
