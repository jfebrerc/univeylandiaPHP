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




var items = ['a','b','c']
var properties = [1,2,3]
var selected = []
var table= [[]]

for (var i = 0; i < items.length; i++) {
table.push([items[i],properties[i]])
}

var renderTable = function() {
var data = document.getElementById('algo');

for (var i = 0; i < table.length; i++) {
var item = table[i][0];
var prop = table[i][1];

var row = document.createElement('tr');
var tdItem = document.createElement('td');
var tdProp = document.createElement('td');

tdItem.innerText = item;
tdProp.innerText = prop;

row.appendChild(tdItem)
row.appendChild(tdProp)

data.appendChild(row)
}
}

renderTable()
