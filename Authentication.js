$(document).ready(function(){
    $('#PaymentCard').hide();

    $(input[type="radio"]).click(function(){
        if($('#memberships').is(":checked")){
            $('#PaymentCard').show();
        }else{
            $('PaymentCard').hide();
        }
    });
})