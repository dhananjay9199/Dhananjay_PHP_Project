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
 //   "<input type='text' required name='model' size='5'/>";onclick='getOption()'
    a.innerHTML ="<select id='model' required name='model' size='1'><option value='Hp2020'>Hp2020</option><option value='Canon210'> Canon210</option><option value='xerox300'>xerox300</option></select>";
    b.innerHTML = "<input type='text' required name='noofprinter' size='5'/>";
    c.innerHTML = "<input type='text' required name='year' size='5'/>";
    d.innerHTML = "<input type='text' required name='noofcarinstock' size='5'/>";
    e.innerHTML = "<input type='text' required name='yearlycons' id='yearlycons' size='5'/>";
    f.innerHTML = "<input type='text' readonly name='qtrlycons' id='qtrlycons' value='0.00' size='5'/>";
    g.innerHTML = "<input type='text' required name='balance' size='5'/>";
    h.innerHTML = "<input type='text' required name='requireofcart' id='requireofcart' size='5'/>";
    i.innerHTML = "<input type='text' required name='priceofcart' id='priceofcart' size='5'/>";
    j.innerHTML = "<input type='text' readonly name='totalprice' id='totalprice' value='0.00' size='5'/>";
    k.innerHTML = "<button onclick='deleteRow(this)'>Delete</button>";

    // $(document).ready(function(){
    //     function loadData(){
    //     $.ajax({
    //     url: "new.php",
    //     type: "POST",
    //     success: function(data) {
    //     var pn = $("#model").append(data);
    //     }
    //     });
    //     }
    //     loadData();
    //     $('#model').val(pn)
        
    //     });

        // devide a & b functioning start
        $('#yearlycons').change(function(){
            devide();
        });
        
        function devide(){
            var qtekyyear = (Number($('#yearlycons').val())) / 4;
            $('#qtrlycons').val(qtekyyear.toFixed(2))
        }
        // devide a & b functioning start
        // totalprise functioning start

        $('#requireofcart').change(function(){
            multiply();
        });
        
        $('#priceofcart').change(function(){
            multiply();
        });

        function multiply(){
            var totalcost = (Number($('#requireofcart').val())) * (Number($('#priceofcart').val()));
            $('#totalprice').val(totalcost.toFixed(2))
        }

    // totalprise functioning end


}

function deleteRow(row) {
    var table = document.getElementById("cartridge-info");
    table.deleteRow(row.parentNode.parentNode.rowIndex);
}