

const facebookAppId = '1718864915071718';

$(function() {
    // import SDK
    $.ajaxSetup({ cache: true });
    $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
        FB.init({
            appId: facebookAppId,
            version: 'v2.8' // or v2.1, v2.2, v2.3, ...
        });
    });




    $('#send_pele_email').on('submit', function(e) {
        var email = $('#email').val();

        if ($.trim(email).length == 0) {
            $('#email_sender_errors').html('Wprowadź email.');
            e.preventDefault();
        } else {
            if (validateEmail(email)) {
                e.preventDefault();
                $('#email_sender_errors').html('Wysyłanie...');

                $.ajax({
                    type: "POST",
                    url: $(this).prop('action'),
                    data: {
                        "_token": $(this).find('input[name=_token]').val(),
                        "list_link": $(this).find('input[name=list_link]').val(),
                        "email": $(this).find('input[name=email]').val()
                    },
                    success: function (data) {

                        if(data.code) {
                            $('#email_sender_errors').addClass('email_sender_succes');
                        } else {
                            $('#email_sender_errors').removeClass('email_sender_succes');
                        }
                        $('#email_sender_errors').html(data.msg);
                    },
                    dataType: 'json'
                });
            } else {
                $('#email_sender_errors').html('Wprowadź poprawny adres email.');
                e.preventDefault();
            }
        }

    });


    $('#facebook_sender').on('click', function() {

        var listLink = $('#list_link').val();

        var app_id = facebookAppId;

        if(mobile_browser.any()) {

            window.open('fb-messenger://share?link=' + encodeURIComponent(listLink) + '&app_id=' + encodeURIComponent(app_id));

        } else {
            FB.ui({

                method: 'send',
              //  display: 'popup',
                link: 'http://p-bilka.pl',
                }, function (response) {
                    if (response && !response.error_message) {
                        alert('Sending completed.');
                    } else {
                        alert('Wystąpił błąd podczas wysyłania. Odśwież stronę i spróbuj ponownie.');
                    }
            });
        }
    });
});











/**
 * Checks if current browser is mobile
 * @return boolean
 */
var mobile_browser = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (mobile_browser.Android() || mobile_browser.BlackBerry() || mobile_browser.iOS() || mobile_browser.Opera() || mobile_browser.Windows());
    }
};




function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}
