var Fullname = document.getElementById("Fullname");
var Email = document.getElementById("Email");
var PhoneNumber = document.getElementById("PhoneNumber");
var password = document.getElementById("password");
var RCPassword = document.getElementById("RCPassword");

var CardName = document.getElementById("paymentCardName");
var CardNumber = document.getElementById("paymentCardNumber");
var ExpDate = document.getElementById("paymentExpDate");
var CVV = document.getElementById("paymentCVV");

var membership = document.getElementById("membership");
var memberships = document.getElementById("memberships");
/*var FreeUser = document.getElementById("itmFreeUser");
var Advertisor = document.getElementById("itmAdvertisor");
var Client = document.getElementById("itmClient");
*/

memberships.onclick = function(){
    var PaymentCard = document.getElementById("PaymentCard");
    if(memberships.checked){
        PaymentCard = PaymentCard.style.visibility = "visible";
    }else if(!membership.checked){
        PaymentCard = PaymentCard.style.display = "hidden"
    }
}
var SignButton = document.getElementById("SignButton");
SignButton.onclick = function(){
    // Do not show anything when the length of password is zero.
    if (password.value.length === 0) {
        document.getElementById("passwordLabel").textContent.style.backgroundColor = "hsl(9, 100%, 64%, 0.9)";
        document.getElementById("passwordLabel").style.display = "block";
        document.getElementById("passwordLabel").style.padding = "0.5rem 0rem";
        document.getElementById("passwordLabel").style.margin = "0.5rem 0";
        document.getElementById("passwordLabel").textContent = "Minumum 8 character pasword";
        return;
    }
  
    // Create an array and push all possible values that you want in password
  
    var matchedCase = new Array();
    matchedCase.push("[$@$!%*#?&]"); // Special Charector
    matchedCase.push("[A-Z]"); // Uppercase Alpabates
    matchedCase.push("[0-9]"); // Numbers
    matchedCase.push("[a-z]"); // Lowercase Alphabates
  
    // Check the conditions
    var ctr = 0;
    for (var i = 0; i < matchedCase.length; i++) {
      if (new RegExp(matchedCase[i]).test(password.value)) {
        ctr++;
      }
    }
}

function UserDetails(validUserDetails){
    var validUserDetails = false;
    while(validUserDetails === false){
        if(Fullname.value.length === 0 || Email.value.length === 0 || PhoneNumber.value.length === 0 || 
            Password.value.length === 0 || RCPassword.value.length === 0){
                alert("Please fill in missing part");
        }
        else{
            validation == true;
            alert("Guess you are in")
        }
        
        if(Fullname.value.length === 0){
            Fullname.style.border= "2px solid red";
            Fullname.value = "";
            Fullname.placeholder = "Please fill in name";
        }  
        else if (PhoneNumber.value.length === 0 && PhoneNumber.value.length < 10){
            PhoneNumber.style.border= "2px solid red";
            PhoneNumber.value = "";
            PhoneNumber.placeholder = "Please fill in phone number";
        }
        else if(Password.value.length === 0){
                Password.style.border= "2px solid red";
                Password.placeholder = "Please fill in password";
        }
        else if(RCPassword.value.length === 0 || !(Password.value === RCPassword.value)){
                RCPassword.style.border= "2px solid red";
                Password.value = "";
                RCPassword.value = "";
                RCPassword.placeholder = "Please fill in reconfirmation password";
        }
        else if(Fullname.value.length > 0 || PhoneNumber.value.length > 9 || Password.value.length >= 8)
        if(Password.value.length >= 8 ){}
        /* case Email.value.length === 0:
                Email.style.border = "2px solid red";
                Email.placeholder = "Please fill in email";
                break;*/
    }

}
function BankDetails(){
     if(CardName.value.length === 0 || CardNumber.value.length === 0 || ExpDate.value.length === 0 || 
        CVV.value.length){
            alert("Please fill in missing payment part");
    }
    else{
        alert("Guess you are in");
    }
}


    
    