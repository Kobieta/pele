

$(function() {
    // SDK initialize
    $.ajaxSetup({ cache: true });
    $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
        FB.init({
            appId: '1718864915071718',
            version: 'v2.7' // or v2.1, v2.2, v2.3, ...
        });
    });



    $('#facebook_sender').on('click', function() {

        var listLink = $('#list_link').val();

        var app_id = '1718864915071718';



        if(mobile_browser.any()) {

            window.open('fb-messenger://share?link=' + encodeURIComponent(listLink) + '&app_id=' + encodeURIComponent(app_id));

        } else {
            FB.ui({

                method: 'send',
              //  display: 'popup',
                link: listLink,
                }, function (response) {
                    if (response && !response.error_message) {
                        alert('Sending completed.');
                    } else {
                        alert('Error while sending messages.');
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
