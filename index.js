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

    a.innerHTML = "<input type='text' required name='nameofasset' size='5'/>";
    b.innerHTML = "<input type='text' required name='year' size='5'/>";
    c.innerHTML = "<input type='text' required name='qty' size='5'/>";
    d.innerHTML = "<input type='text' id='authorization' required name='authorization' size='3' onclick='diffrence();'/>";
    e.innerHTML = "<input type='text' id='qtyashelddate' required name='qtyashelddate' size='3' onclick='diffrence();'/>";
    f.innerHTML = "<input type='text' id='surplus' readonly value='0.00' name='surplus' size='5'/>";
    g.innerHTML = "<input type='text' id='deficiency' readonly value='0.00' name='deficiency' size='5'/>";
    h.innerHTML = "<input type='text' required name='qtyprocured' size='5'/>";
    i.innerHTML = "<input type='text' id='totalqty' required name='totalqty'  size='5' onclick='multiply();'/>";
    j.innerHTML = "<input type='text' id='cost' required name='cost' size='5' onclick='multiply();'/>";
    k.innerHTML = "<input type='text' id='totalcost' required readonly value='0.00' name='totalcost' size='5'/>";
    l.innerHTML = "<button onclick='deleteRow(this)'>Delete</button>";


    // diffrence a & b functioning start

    $('#authorization').change(function(){
        diffrence();
    });
    
    $('#qtyashelddate').change(function(){
        diffrence();
    });
    
    function diffrence(){
        if($('#authorization').val() > $('#qtyashelddate').val()){
            var loss = 0;
            $('#surplus').val(loss.toFixed(2))
            var profit = (Number($('#authorization').val())) - (Number($('#qtyashelddate').val())); 
            $('#deficiency').val(profit.toFixed(2))
    
        } else if($('#authorization').val() < $('#qtyashelddate').val()){
            var profit = 0;
            $('#deficiency').val(profit.toFixed(2))
            var loss = (Number($('#qtyashelddate').val())) - (Number($('#authorization').val()));
            $('#surplus').val(loss.toFixed(2))
        }
    }
    // diffrence a & b functioning end
    // totalprise functioning start

    $('#totalqty').change(function(){
        multiply();
    });
    
    $('#cost').change(function(){
        multiply();
    });

    function multiply(){
        var totalprise = (Number($('#totalqty').val())) * (Number($('#cost').val()));
        $('#totalcost').val(totalprise.toFixed(2))
    }

    // totalprise functioning end
}

function deleteRow(row) {
    var table = document.getElementById("inventory-info");
    table.deleteRow(row.parentNode.parentNode.rowIndex);
}




