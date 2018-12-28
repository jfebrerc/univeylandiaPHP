//var items = ['a','b','c']
var properties = [1,2,3]
var selected = []
var table= [[]]

for (var i = 0; i < mida_triada.length; i++) {
table.push([mida_triada[i],properties[i]])
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
