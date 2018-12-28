<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<title>Proves Array en JS</title>
</head>

<body>
	<script type="text/javascript">
		var roba = new Array('Article 1', 'Article 2', 'Article 3', 'Article 4');
		var color = new Array('Atribut 1', 'Atribut 2', 'Atribut 3');
		var talla = new Array('Tipus 1', 'Tipus 2', 'Tipus 3');
		var pedido = new Array(roba, color, talla);
		var preu_roba = new Array(30, 15, 20, 5);
		var preu_color = new Array(2, 2, 2);
		var preu_talla = new Array(5, 5, 5, 5);
		var tot_preu = new Array(preu_roba, preu_color, preu_talla);
		//Afegir elements en els arrays
		var roba = roba.push('Article 5');
		var preu_roba = preu_roba.push(10);
		var roba_triat = new Array();
		var resultat = 0;
		var ultims_preus = new Array();
		function calcular_preu(tot_preu, i, j, pedido) {
			resultat = resultat + tot_preu[i][j];
			roba_triat.push(pedido[i][j]);
			ultims_preus.push(tot_preu[i][j]);
			document.getElementById('preu').innerHTML = resultat;
			document.getElementById('cistella').innerHTML = roba_triat;
		}
			function eliminar_ultim() {
			if (resultat > 0) {
				roba_triat.pop();
				preu_a_restar = ultims_preus.pop();
				resultat = resultat - preu_a_restar;
				document.getElementById('preu').innerHTML = resultat;
				document.getElementById('cistella').innerHTML = roba_triat;
			}
		}
		function buidar_cistella() {
			resultat = 0;
			roba_triat = [];
			document.getElementById('preu').innerHTML = resultat;
			document.getElementById('cistella').innerHTML = roba_triat;
		}
		document.write('<h1> Proves Array en JS </h1>');
		for (i = 0; i < pedido.length; i++) {
			for (j = 0; j < pedido[i].length; j++) {
				document.write('<button onclick="calcular_preu(tot_preu,' + i + ',' + j + ',pedido)">' +pedido[i][j]+ '</button>');
				document.write('&nbsp; &nbsp;');
			}
			document.write('<br> <br> <br>');
		}
		document.write('<button onclick="eliminar_ultim()">Eliminar</button>');
		document.write('<button onclick="buidar_cistella()">Buidar articles</button>');
		document.write('<p>TOTAL (€)</p>');
		document.write('<p id="preu">0</p>');
		document.write('<p>ARTICLES SELECCIONATS</p>');
		document.write('<p id="cistella"></p>');
	</script>
</body>

</html>
