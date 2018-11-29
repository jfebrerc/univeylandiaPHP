



function numerosRandom(){
var primernumero = Math.floor(Math.random()* 10);
var segonnumero = Math.floor(Math.random()* 10);
var operacio =  Math.floor(Math.random()* 3);
document.getElementById("primerdigit").innerHTML = primernumero;
document.getElementById("simbol").innerHTML = operacio;
document.getElementById("segondigit").innerHTML = segonnumero;
}
function operacionesRandom(primernumero,segonnumero,operacio){
  var validar = document.getElementById("resposta").value;
  var primerdigit = parseInt(document.getElementById("primerdigit").innerHTML);
  var segondigit = parseInt(document.getElementById("segondigit").innerHTML);
  if (operacio == 0){
    eval("primerdigit + segondigit") ;
    if (validar == null || validar == ""|| isNaN(validar)){
      alert("Introdueix un numero");
      return false;
    }
    else if (validar != eval("primerdigit + segondigit")){
    alert ("Error has fallat");
    return false;
    }
    else if (validar == eval("primerdigit + segondigit")){
    alert("molt be fill de puta");
    }
  }

  else if (operacio == 1) {
     eval ("primerdigit - segondigit");
     if (validar == null || validar == ""|| isNaN(validar)){
       alert("Introdueix un numero");
       return false;
     }
     else if (validar != eval("primerdigit - segondigit")){
     alert ("Error has fallat");
     return false;
     }
     else if (validar == eval("primerdigit - segondigit")){
     alert("molt be fill de puta");
     }
  }
  else {
    eval(" primerdigit * segondigit");
    if (validar == null || validar == ""|| isNaN(validar)){
      alert("Introdueix un numero");
      return false;
    }
    else if (validar != eval("primerdigit * segondigit")){
    alert ("Error has fallat");
    return false;
    }
    else if (validar == eval("primerdigit * segondigit")){
    alert("molt be fill de puta");
    }
  }
}
