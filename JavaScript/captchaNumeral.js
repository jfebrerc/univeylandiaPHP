


var primerdigit;
var segondigit;
var operacio;
function numerosRandom(){
 primerdigit = Math.floor(Math.random()* 10);
 segondigit = Math.floor(Math.random()* 10);
 operacio =  Math.floor(Math.random()* 3);
var simbol ="";
document.getElementById("primerdigit").innerHTML = primerdigit;
if (operacio == 0){
  simbol = "+";
  document.getElementById("simbol").innerHTML = simbol;
}
else if (operacio == 1){
  simbol = "-";
  document.getElementById("simbol").innerHTML = simbol;
}
else{
  simbol ="*";
  document.getElementById("simbol").innerHTML = simbol;
}

document.getElementById("segondigit").innerHTML = segondigit;
}



function operacionesRandom(){
  var validar = document.getElementById("resposta").value;
  var resultadobueno;
  if (operacio == 0){
    resultadobueno = eval(" primerdigit + segondigit");
    if (validar == null || validar == ""|| isNaN(validar)){
      alert("Introdueix un numero");
      return false;
    }
    else if (validar != resultadobueno){
    alert ("Error has fallat");
    return false;
    }
    else if (validar == resultadobueno){
    alert("molt be!");
    }
  }

  else if (operacio == 1) {
    resultadobueno = eval(" primerdigit - segondigit");
    if (validar == null || validar == ""|| isNaN(validar)){
      alert("Introdueix un numero");
      return false;
    }
    else if (validar != resultadobueno){
    alert ("Error has fallat");
    return false;
    }
    else if (validar == resultadobueno){
    alert("molt be!");
    }
  }
  else {
    resultadobueno=eval(" primerdigit * segondigit");
    if (validar == null || validar == ""|| isNaN(validar)){
      alert("Introdueix un numero");
      return false;
    }
    else if (validar != resultadobueno){
    alert ("Error has fallat");
    return false;
    }
    else if (validar == resultadobueno){
    alert("molt be!");
    }
  }
}
function finestraBannerAtraccio(){
    //setTimeout(function(){ alert("Estas preparat per al Nadal?"); }, 5000);
    myWindow1=window.open('','Ventana','width=720,height=480')
	myWindow1.document.write('<html>')
	myWindow1.document.write('<head>')
	myWindow1.document.write('<title>UNIVEYLANDIA ATRACCIONS MES FAMOSES</title>')
	myWindow1.document.write('</head>')
	myWindow1.document.write('<body>')
    myWindow1.document.write('<img src= "img/tornado.jpg" />')
	myWindow1.document.write('</body>')
	myWindow1.document.write('</html>')
  myWindow1.setInterval(moveFinetraPromocio, 70);

}

function moveFinetraPromocio(){
    myWindow1.moveBy(0, 1);
    ++contador;
    if (contador == 800){
      myWindow1.close();
    }

}
