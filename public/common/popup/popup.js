/**
 * Created by liyulin on 2017-03-18.
 */
$(function(){
    //关闭
    $("div[role='dialog'] .mm-close").click(function(){
        var div = $(this).parents("div[role='dialog']");
        div.fadeOut(400);
        div.css("display","none");
    });
    //提示
    $("div[role='dialog'] input[type='text']").blur(function(){
        if($(this).val()==""){
            show_error($(this).attr("placeholder"));
        }
    })

})
function show_error(content){
    if($('.sn-popup-container').length > 0){
        $('.sn-popup-container').remove();
    };
    var width = 400;
    var height = 50;
    var popup_html="<div class='mm-popup-container' >" +
        "<div class='mm-popup-icon'>" +
        "<img class='mm-popup-img' src='/public/common/popup/images/prompt.png'></div>" +
        "<div class='mm-popup-text'>"+content+"</div></div>";
    $('body').append(popup_html);
    $('.mm-popup-container').css({
        'width' : width+'px',
        'height' : height+'px',
        'margin-left' : -width/2+'px',
        'margin-top' : -height/2+'px',
        'opacity':0,
    });
    $('.mm-popup-text').css({
        'line-height' : height+'px',
    });
    /*解决ie浏览器下偶尔初次img加载比css加载快引发的宽度问题*/
    $('.mm-popup-icon').css({
        'height' : height+'px',
    });
    $('.mm-popup-container').animate({
        'opacity':1,
    },500);

    setTimeout(function(){
        $('.mm-popup-container').animate({
            'opacity':0,
        },600,function(){
            $(this).remove();
        });
    },1500);
}