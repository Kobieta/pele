$(function() {

    $('#usernameChanger').on('click', function() {
        $('.username_change').slideToggle(50);
    });

    $('.ui.checkbox')
        .checkbox()
    ;
    var activeMenu = false;

    $('#menuActivator').on('click', function() {


        if(activeMenu) {

            $(this).css('background-color', 'transparent');
            $( ".sticky" ).animate({
                opacity: 0.88,
                bottom: '-150px'
            }, 300, function() {

                $(this).css('opacity', '1');

            });

            activeMenu = false;

        } else {
            $(this).css('background-color', '#8bd6c6');
            $( ".sticky" ).animate({
                opacity: 0.88,
                bottom: "0"
            }, 300, function() {

                $(this).css('opacity', '1');

            });
            activeMenu = true;
        }

    });

});