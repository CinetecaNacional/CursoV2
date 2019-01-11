$(document).ready(function(){
  $('.form_singUp').hide();
  var btn_logIn = $('#btn_logIn'),
  btn_singUp =$('#btn_singUp');
  btn_logIn.click(function(){
    btn_logIn.removeClass("btn-light").addClass("btn-primary");
    btn_singUp.removeClass("btn-primary").addClass("btn-light");
    $('.form_singUp').hide();
    $('.form_logIn').show();
  });
  btn_singUp.click(function () {
    btn_logIn.removeClass("btn-primary").addClass("btn-light");
    btn_singUp.removeClass("btn-light").addClass("btn-primary");
    $('.form_logIn').hide();
    $('.form_singUp').show();
  });
});
