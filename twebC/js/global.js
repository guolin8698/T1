$(function(){ 
    $("#user").focus(); 
}); 
$("input:text,textarea,input:password").focus(function() { 
    $(this).addClass("cur_select"); 
}); 
$("input:text,textarea,input:password").blur(function() { 
    $(this).removeClass("cur_select"); 
}); 
