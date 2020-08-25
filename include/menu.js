$(document).ready(function () {

    $(".menu > li").children("div").hide();

    $(".menu > li").mouseover(function(e) {
        $(this).children("div").show();
    });
    $(".menu > li").mouseout(function(e) {
        $(this).children("div").hide();
    });

});