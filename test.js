var figura = new Array('Figura univeylandia', 'Figura dragon can', 'Figura mascota ', 'Figura tremor');
var mida = new Array('Menuda', 'Mitjana', 'Gran');

var pedido = new Array(figura, mida);
var preuFigura = new Array(30, 15, 20, 5);
var preuMida = new Array(2, 4, 8);

var total = new Array(preuFigura, preuMida);

var figura = figura.push('Figura vikings');
var preuFigura = preuFigura.push(10);
var figura_triada = new Array();
var mida_triada = new Array();
var resultat = 0;
var ultims_preus = new Array();
var seleccio_figura = 0;
var taula;

function tableCreate(files_num, mida_triada, figura_triada) {
  var body = document.getElementsByTagName('body')[0];
  var tbl = document.createElement('table');
  tbl.style.width = '100%';
  tbl.setAttribute('border', '1');
  var tbdy = document.createElement('tbody');
  for (var i = 0; i < files_num; i++) {
    var tr = document.createElement('tr');
    for (var j = 0; j < 2; j++) {
      if (i == 2 && j == 1) {
        break
      } else {
        var td = document.createElement('td');
        td.appendChild(document.createTextNode(mida_triada))
        var td2 = document.createElement('td');
        td2.appendChild(document.createTextNode(figura_triada))
        //i == 1 && j == 1 ? td.setAttribute('rowSpan', '2') : null;
        tr.appendChild(td)
      }
    }
    tbdy.appendChild(tr);
  }
  tbl.appendChild(tbdy);
  body.appendChild(tbl)
}


function calcular_preu_figura(total, i, j, pedido) {
  if (seleccio_figura == 0) {
    resultat = resultat + total[i][j];
    figura_triada.push(pedido[i][j]);
    ultims_preus.push(total[i][j]);
    document.getElementById('preu').innerHTML = resultat;
    document.getElementById('cistella').innerHTML = figura_triada;
    seleccio_figura = 1;
  }
  else {
    alert("Ja hi ha una figura seleccionada, tria una mida.");
  }
}

function calcular_preu(total, i, j, pedido) {
  if (seleccio_figura == 1) {
    resultat = resultat + total[i][j];
    mida_triada.push(pedido[i][j]);
    ultims_preus.push(total[i][j]);
    document.getElementById('preu').innerHTML = resultat;
    document.getElementById('cistella_mida').innerHTML = mida_triada;
    seleccio_figura = 0;
    tableCreate(mida_triada.length, mida_triada[mida_triada.length-1], figura_triada[figura_triada.length-1]);
  }else {
    alert("Selecciona una figura per a triar la seva mida!.");
  }
}
  function eliminar_ultim() {
  if (resultat > 0) {
    figura_triada.pop();
    preu_a_restar = ultims_preus.pop();
    resultat = resultat - preu_a_restar;
    document.getElementById('preu').innerHTML = resultat;
    document.getElementById('cistella').innerHTML = figura_triada;

  }
}
function buidar_cistella() {
  resultat = 0;
  figura_triada = [];
  document.getElementById('preu').innerHTML = resultat;
  document.getElementById('cistella').innerHTML = figura_triada;
}
document.write('<h3> Tenda figures </h3>');
/*for (i = 0; i < pedido.length; i++) {
  for (j = 0; j < pedido[i].length; j++) {
    document.write('<button class="btn btn-secondary btn-lg" onclick="calcular_preu(total,' + i + ',' + j + ',pedido)">' +pedido[i][j]+ '</button>');
    document.write('&nbsp; &nbsp;');
  }
  document.write('<br> <br>');
}*/
//document.write('<p> Patata </p>');
  for (j = 0; j < pedido[0].length; j++) {
    //document.write('<p>' + pedido[0][j] + '</p>');
    document.write('<button class="btn btn-secondary btn-lg" onclick="calcular_preu_figura(total,' + 0 + ',' + j + ',pedido)">' +pedido[0][j]+ '</button>');
    document.write('&nbsp; &nbsp;');
  }
  document.write('<br> <br>');
  for (k = 0; k < pedido[1].length; k++) {
    document.write('<button class="btn btn-secondary btn-lg" onclick="calcular_preu(total,' + 1 + ',' + k + ',pedido)">' +pedido[1][k]+ '</button>');
    document.write('&nbsp; &nbsp;');
  }
  document.write('<br> <br>');
document.write('<br>');
document.write('<button class="btn btn-primary btn-lg" onclick="eliminar_ultim()">Eliminar</button>');
document.write('&nbsp; &nbsp;');
document.write('<button class="btn btn-primary btn-lg" onclick="buidar_cistella()">Buidar carrito</button>');
document.write('<br> <br>');
document.write('<p>Preu: <text id="preu"> 0 </text></p>');
document.write('<p>Carrito: <text id="cistella"> </text></p>');
document.write('<p>Carrito mida: <text id="cistella_mida"> </text></p>');
