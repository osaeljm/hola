function getCreditCardType(accountNumber){        
	var result = "unknown";
	if(/^3[47][0-9]{13}$/.test(accountNumber)){
		result = "ae";
	}else if(/(^30[0-5][0-9]).{10}$/.test(accountNumber)){
		result = "dccb";
	}else if(/^36[0-9]{12}$/.test(accountNumber)){
		result = "dci";
	}else if(/^54[0-9]{14}$/.test(accountNumber)){
		result = "dcuc";
	}else if(/^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5])|64[4-9]|65)/.test(accountNumber) && /^.{16}$/.test(accountNumber)){
		//repasar
		result = "d";	
	}else if(/^63[7-9][0-9]{13}$/.test(accountNumber)){
		result = "ip";
	}else if(/^35(2[8-9]|[3-8][0-9]|8[0-9])/.test(accountNumber) && /^.{16}$/.test(accountNumber)){
		//repasar
		result = "jcb";
	}else if(/^(6304|6706|6771|6709)[0-9]{12,15}$/.test(accountNumber)){
		result = "laser";
	}else if(/^(5018|5020|5038|5893|6304|6759|676[1-3])[0-9]{12,15}$/.test(accountNumber)){
		result = "maestro";	
	}else if(/^5[1-5][0-9]{14,17}$/.test(accountNumber)){
		result = "mastercard";			
	}else if (/^4[0-9]{12,15}$/.test(accountNumber)){
	  	result = "visa";
	}else if(/^(4026|417500|4508|4844|4913|4917)[0-9]/.test(accountNumber) && /^.{16}$/.test(accountNumber)){
		result = "visae";			
	}
	return result;
}

function handleEvent(event){
	var value = event.target.value, 
	type = getCreditCardType(value);
	switch(type){
        case "ae":                
           document.getElementById('img').src = "images/tarjeta/ae.jpg";
           document.getElementById('img').style.visibility = "visible";
           document.getElementById('error').style.visibility="hidden";
           ValidCard();
           break;
        case "dccb":                
           document.getElementById('img').src = "images/tarjeta/dccb.jpg";
		   document.getElementById('img').style.visibility = "visible";
		   document.getElementById('error').style.visibility="hidden";
		   ValidCard();
           break;
        case "dci":                
           document.getElementById('img').src = "images/tarjeta/dci.jpg";
		   document.getElementById('img').style.visibility = "visible";
		   document.getElementById('error').style.visibility="hidden";
		   ValidCard();
           break;
        case "dcuc":                
           document.getElementById('img').src = "images/tarjeta/dcuc.jpg";
           document.getElementById('img').style.visibility = "visible";
           document.getElementById('error').style.visibility="hidden";
           ValidCard();
           break;
        case "d":                
           document.getElementById('img').src = "images/tarjeta/d.jpg";
           document.getElementById('img').style.visibility = "visible";
           document.getElementById('error').style.visibility="hidden";
           ValidCard();
           break;
        case "ip":                
           document.getElementById('img').src = "images/tarjeta/ip.jpg";
           document.getElementById('img').style.visibility = "visible";
           document.getElementById('error').style.visibility="hidden";
           ValidCard();
           break;
        case "jcb":                
           document.getElementById('img').src = "images/tarjeta/jcb.jpg";
           document.getElementById('img').style.visibility = "visible";
           document.getElementById('error').style.visibility="hidden";
           ValidCard();
           break;
        case "laser":                
           document.getElementById('img').src = "images/tarjeta/laser.jpg";
           document.getElementById('img').style.visibility = "visible";
           document.getElementById('error').style.visibility="hidden";
           ValidCard();
           break;
        case "maestro":                
           document.getElementById('img').src = "images/tarjeta/maestro.jpg";
           document.getElementById('img').style.visibility = "visible";
           document.getElementById('error').style.visibility="hidden";
           ValidCard();
           break;  
        case "mastercard":                
           document.getElementById('img').src = "images/tarjeta/mastercard.jpg";
		   document.getElementById('img').style.visibility = "visible";
		   document.getElementById('error').style.visibility="hidden";
		   ValidCard();
           break; 
        case "visa":                
           document.getElementById('img').src = "images/tarjeta/visa.jpg";
           document.getElementById('img').style.visibility = "visible";
           document.getElementById('error').style.visibility="hidden";
           ValidCard();
           break;
        case "visae":                
           document.getElementById('img').src = "images/tarjeta/visae.jpg";
    		   document.getElementById('img').style.visibility = "visible";
    		   document.getElementById('error').style.visibility="hidden";
    		   ValidCard();
           break;
        default:                
            var card = document.getElementsByClassName('card');            
            for (var i = 0; i < card.length; i ++) {
            	card[i].style.visibility="hidden";
      				document.getElementById('error').style.visibility="visible";
      				InvalidCard();
            }
    }
}

function ValidCard(){
document.getElementById("card").className = "validcard";
document.getElementById("send2").style.visibility="visible";
};

function InvalidCard(){
document.getElementById("card").className = "invalidcard";
document.getElementById("send2").style.visibility="hidden";
};

var LuhnCheck = (function () {
    var luhnArr = [0, 2, 4, 6, 8, 1, 3, 5, 7, 9];
    return function (str) {
        var counter = 0;
        var incNum;
        var odd = false;
        var temp = String(str).replace(/[^\d]/g, "");
        if (temp.length == 0)
            return false;
        for (var i = temp.length - 1; i >= 0; --i) {
            incNum = parseInt(temp.charAt(i), 10);
            counter += (odd = !odd) ? incNum : luhnArr[incNum];
        }
        return (counter % 10 == 0);
    }
})();

document.addEventListener("DOMContentLoaded", function(){
  var textbox = document.getElementById("card");
  textbox.addEventListener("keyup", handleEvent, false);
  textbox.addEventListener("blur", handleEvent, false);
}, false);