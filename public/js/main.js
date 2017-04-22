$(function() {

    $('#usernameChanger').on('click', function() {
        $('.username_change').slideToggle(50);
    });

    $('.ui.checkbox')
        .checkbox();


    var activeMenu = false;


    $('#menuActivator').on('click', function() {


        if(activeMenu) {

            $( ".sticky" ).animate({
                bottom: '-220px'
            }, 250, function() {



            });


            activeMenu = false;

        } else {

            $( ".sticky" ).animate({

                bottom: "0"
            }, 250, function() {


            });
            activeMenu = true;
        }

    });

});