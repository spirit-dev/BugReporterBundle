$(document).ready(function () {

    $('#bug-report-form')
        .on('submit', function (e) {
            e.preventDefault();
        })
        .on('valid.fndtn.abide', function () {

            var $this = $(this);

            var al = new gifLoader(".bug-reporter");

            $.ajax({
                url: $this.attr('action'),
                type: $this.attr('method'),
                data: $this.serialize(),
                success: function (data) {
                    console.log(data);
                    bugReportSuccessDisplay();
                },
                error: function (data) {
                    console.log(data)
                    bugReportErrorDisplay();
                },
                complete: function () {
                    al.remove();
                }
            });
        });

});

function bugReportErrorDisplay() {
    $('#report-issue').html('<div id="report-removal" class="alert-box alert">Sorry an, error occured! You may retry.</div>');
    setTimeout(function () {
        $('#report-removal').remove();
    }, 5000);
}

function bugReportSuccessDisplay() {
    $('#report-issue').html('<div id="report-removal" class="alert-box success">Your bug has been well reported! We will manage it soon.</div>');
    //setTimeout(function () {
    //    $('#report-removal').remove();
    //    $('.bug-reporter a').click();
    //    $('.small-input').val('');
    //}, 5000);
}