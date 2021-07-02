$(document).ready(function(){
    $("[id^=login]").click(function(e){
        e.preventDefault();
        $("#login-form").show().removeClass("fadeIn delay-3s").addClass("animated fadeInUp");
        $("#sign-up-form").hide();
    })
    $("[id^=signup]").click(function(e){
        e.preventDefault();
        console.log("ksdjfoi");
        $("#login-form").hide();
        $("#sign-up-form").show().addClass("animated fadeInUp");
    })
});