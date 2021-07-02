const  notice = $("#notice");
notice.keydown(function () {
    $("#show-notice").css({'display':'block', 'font-size': '12px'});
    $("#code-notice").css({'display':'block', 'font-size': '12px'});
})
notice.blur(function () {
    $("#show-notice").css({'display':'none'});
})