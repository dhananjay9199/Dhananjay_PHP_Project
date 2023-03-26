function addRow() {
    var table = document.getElementById("inventory-info");
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
    var l = row.insertCell(11);

    a.innerHTML = "<input type='text' name='nameofasset' size='10'/>";
    b.innerHTML = "<input type='text' name='year' size='5'/>";
    c.innerHTML = "<input type='text' name='qty' size='5'/>";
    d.innerHTML = "<input type='text' name='authorization' size='5'/>";
    e.innerHTML = "<input type='text' name='qtyashelddate' size='5'/>";
    f.innerHTML = "<input type='text' name='surplus' size='5'/>";
    g.innerHTML = "<input type='text' name='deficiency' size='5'/>";
    h.innerHTML = "<input type='text' name='qtyprocured' size='5'/>";
    i.innerHTML = "<input type='text' name='totalqty' size='5'/>";
    j.innerHTML = "<input type='text' name='cost' size='5'/>";
    k.innerHTML = "<input type='text' name='totalcost' size='5'/>";
    l.innerHTML = "<button onclick='deleteRow(this)'>Delete</button>";
}

function deleteRow(row) {
    var table = document.getElementById("inventory-info");
    table.deleteRow(row.parentNode.parentNode.rowIndex);
}