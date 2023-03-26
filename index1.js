function addRow() {
    var table = document.getElementById("cartridge-info");
    var row = table.insertRow(-1);
    var a = row.insertCell(0);
    var b = row.insertCell(1);
    var c = row.insertCell(2);
    var d = row.insertCell(3);
    var e = row.insertCell(4);
    var f = row.insertCell(5);
    var g = row.insertCell(6);
    var h = row.insertCell(7);
    var i = row.insertCell(8);
    var j = row.insertCell(9);
    var k = row.insertCell(10);

    a.innerHTML = "<input type='text' name='model' size='10'/>";
    b.innerHTML = "<input type='text' name='noofprinter' size='5'/>";
    c.innerHTML = "<input type='text' name='year' size='5'/>";
    d.innerHTML = "<input type='text' name='noofcarinstock' size='5'/>";
    e.innerHTML = "<input type='text' name='yearlycons' size='5'/>";
    f.innerHTML = "<input type='text' name='qtrlycons' size='5'/>";
    g.innerHTML = "<input type='text' name='balance' size='5'/>";
    h.innerHTML = "<input type='text' name='requireofcart' size='5'/>";
    i.innerHTML = "<input type='text' name='priceofcart' size='5'/>";
    j.innerHTML = "<input type='text' name='totalprice' size='5'/>";
    k.innerHTML = "<button onclick='deleteRow(this)'>Delete</button>";
}

function deleteRow(row) {
    var table = document.getElementById("cartridge-info");
    table.deleteRow(row.parentNode.parentNode.rowIndex);
}