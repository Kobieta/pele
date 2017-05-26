$(function() {

    $("#listCopyButton").click(function(){
        $("#list_link").select();
        document.execCommand('copy');
    });

});