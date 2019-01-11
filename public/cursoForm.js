$(document).ready(function(){
  var offerPrice = $('#input_offerPrice');
  var price = $('#input_price');
  var dateAvailable = $('#input_dateAvailable');
    $('#input_kindCourse').on('change',function(){
        //var optionValue = $(this).val();
        //var optionText = $('#dropdownList option[value="'+optionValue+'"]').text();
        var kindCourse = $("#input_kindCourse option:selected").text();
        if(kindCourse=="Presencial"){
          $('#form-group-offerPrice').attr("hidden","true");
          $('#form-group-dateAvailable').attr("hidden","true");
          dateAvailable.val("");
          offerPrice.val("");
        }else if(kindCourse=="Online"){
          $('#form-group-dateAvailable').removeAttr("hidden");

          $('#form-group-offerPrice').removeAttr("hidden");
        }
    });
    offerPrice.blur(function(){
      if(offerPrice.val()){
        offerPrice.val(parseFloat(offerPrice.val()).toFixed(2));
        dateAvailable.attr("required","true");
      }else {
        dateAvailable.removeAttr("required");
        dateAvailable.val(" ");
      }
    });
    price.blur(function(){
      if(price.val()){
        price.val(parseFloat(price.val()).toFixed(2));
      }
    });
});
