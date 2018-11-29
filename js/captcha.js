var resultat;

function getRandom() {
  return Math.ceil(Math.random()* 10);
}

function getRandom2() {
  return Math.ceil(Math.random()* 2);
}

function generarCaptcha(){
  var random1 = getRandom();
  var random2 = getRandom();
  var random3 = getRandom2();
  if (random3 === 0) {
    resultat = eval("random1 + random2");
    var captcha = random1 + " + " + random2 + " = ?";
    document.getElementById("mainCaptcha").value = captcha;
  }
  else if (random3 === 1) {
    resultat = eval("random1 - random2");
    var captcha = random1 + " - " + random2 + " = ?";
    document.getElementById("mainCaptcha").value = captcha;
  }
  else {
    resultat = eval("random1 * random2");
    var captcha = random1 + " * " + random2 + " = ?";
    document.getElementById("mainCaptcha").value = captcha;
  }
}

function comprovarCaptcha() {
  var input = document.getElementById('txtInput').value;
  if (resultat == input) {
    document.getElementById('success').innerHTML = "Correcte";
    //alert("Form is validated Successfully");
    return true;
  } else {
    document.getElementById('error').innerHTML = "Error";
    //alert("Please enter a valid captcha.");
    return false;
  }
}

function previCaptcha() {
  if (comprovarCaptcha() == true) {
    location.assign("https://www.w3schools.com");
  }
  else {
    generarCaptcha();
  }
}
