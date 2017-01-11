(function () {

    $(document).ready(function () {

        var path = window.location.href;

        var pattern = /[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/igm;

        var mail = $('#mail');

        var mailSec = $('#mail-sec');

        var mailModal = $('#newEmail');

        var fileToSend = $('#Attach-Doc');

        var form = $('#contact_body');

        var formSec = $('#contact_second');

        var submitToSend = $('#submit');

        var skipToSend = $('#skip');

        var backToSend = $('#back');

        var sendToSend = $('#send')

        var messageToSend = $('#message');

        var validMail = $('#valid');

        var validMailSec = $('#valid-sec');

        var validInclude = $('#valid-file');

        var inputType = $('#inputype');

        var validMess = $('#valid-mess');

        var validFile = $('#valid-file');

        var showModal = $('#contact_dialog');

        var redirectLink = $('#redirect');

        var formData


        submitToSend.click(function () {
            if (inputType.val() == '') {
                inputType.addClass('error');
                validFile.text('Please include file');
            } else if (inputType.val() && mail.val().search(pattern) !== 0) {
                window.location.replace('complete.html');
            } else {
                window.location.replace('success.html');
            }
        });


        sendToSend.click(function () {
            if (mailSec.val().search(pattern) !== 0) {
                validMailSec.text('Please write your email');
            } else {
                window.location.replace('success.html');
            }
        });

        skipToSend.click(function () {
            window.location.replace('success.html');
        });

        backToSend.click(function () {
            window.location.replace('submit.html')
        });


        form.change(function () {

            if (mail.val() != '') {

                if (mail.val().search(pattern) == 0) {
                    mail.removeClass('error').addClass('success');
                    validMail.text('Email is correct');
                } else {
                    validMail.text('The email is incorrect');
                    mail.addClass('error');
                }
            } else {
                // validMail.text('would you like to write e-mail?');
                mail.addClass('error');
            }

            if ($.trim(messageToSend.val()).length < 1) {

                messageToSend.addClass('error');
            } else {

                messageToSend.removeClass('error').addClass('success');
            }

        });

        formSec.change(function () {
            if (mailSec.val() != '') {
                if (mailSec.val().search(pattern) == 0) {
                    validMailSec.text('Email is correct');
                    mailSec.removeClass('error').addClass('success');
                } else {
                    validMailSec.text('The email is incorrect');
                    mailSec.removeClass('success').addClass('error');
                }
            } else {

                mailSec.addClass('success');
            }
        });


        form.submit(function (e) {
            formData = new FormData($(this)[0]);
            e.preventDefault();

            if (validMail.text() === 'Email is correct') {

            } else {

            }
        });


        //submit ajax
        var allowed_file_size = "2097152";
        var allowed_files = ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg'];
        var border_color = "#C2C2C2"; //initial input border color

        form.submit(function (e) {
            e.preventDefault(); //prevent default action
            proceed = true;

            //simple input validation
            $($(this).find("input[data-required=true], textarea[data-required=true]")).each(function () {
                if (!$.trim($(this).val())) { //if this field is empty
                    $(this).css('border-color', 'red'); //change border color to red
                    proceed = false; //set do not proceed flag
                }
            }).on("input", function () { //change border color to original
                $(this).css('border-color', border_color);
            });

            //check file size and type before upload, works in modern browsers
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                var total_files_size = 0;
                $(this.elements['file_attach[]'].files).each(function (i, ifile) {
                    if (ifile.value !== "") { //continue only if file(s) are selected
                        if (allowed_files.indexOf(ifile.type) === -1) { //check unsupported file
                            alert(ifile.name + " is unsupported file type!");
                            proceed = false;
                        }
                        total_files_size = total_files_size + ifile.size; //add file size to total size
                    }
                });
                if (total_files_size > allowed_file_size) {
                    alert("Make sure total file size is less than 2MB!");
                    proceed = false;
                }
            }

            //if everything's ok, continue with Ajax form submit
            if (proceed) {
                var post_url = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data = new FormData(this); //Creates new FormData object

                $.ajax({ //ajax form submit
                    url: post_url,
                    type: request_method,
                    data: form_data,
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false
                }).done(function (res) { //fetch server "json" messages when done
                    if (res.type == "error") {
                        $("#contact_results").html('<div class="error">' + res.text + "</div>");
                    }

                    if (res.type == "done") {
                        $("#contact_results").html('<div class="success">' + res.text + "</div>");
                    }
                });
            }
        });

        //complete ajax

        // When the user clicks on, open the popup

        formSec.submit(function (e) {
            e.preventDefault(); //prevent default action
            proceed = true;

            //simple input validation
            $($(this).find("input[data-required=true], textarea[data-required=true]")).each(function () {
                if (!$.trim($(this).val())) { //if this field is empty
                    $(this).css('border-color', 'red'); //change border color to red
                    proceed = false; //set do not proceed flag
                }

            }).on("input", function () { //change border color to original
                $(this).css('border-color', border_color);
            });

            //if everything's ok, continue with Ajax form submit
            if (proceed) {
                var post_url = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data = new FormData(this); //Creates new FormData object

                $.ajax({ //ajax form submit
                    url: post_url,
                    type: request_method,
                    data: form_data,
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false
                }).done(function (res) { //fetch server "json" messages when done
                    if (res.type == "error") {
                        $("#results").html('<div class="error">' + res.text + "</div>");
                    }

                    if (res.type == "done") {
                        $("#results").html('<div class="success">' + res.text + "</div>");
                    }
                });
            }
        });




    });

}());
