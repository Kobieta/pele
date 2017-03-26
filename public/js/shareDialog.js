

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

        var listLink = 'http://p-bilka.pl';

      // nie działa dla localhosta:
      // listLink = $('#list_link').val();

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

    });
});