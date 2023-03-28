<?php 
include("conn.php");
error_reporting(0);
?>

<?php
if(isset($_POST['submit'])){

$model = $_POST['model'];
$noofprinter = $_POST['noofprinter'];
$year = $_POST['year'];
$noofcarinstock = $_POST['noofcarinstock'];
$yearlycons = $_POST['yearlycons'];
$qtrlycons = ( $yearlycons / 4 );
$balance = $_POST['balance'];
$requireofcart = $_POST['requireofcart'];
$priceofcart = $_POST['priceofcart'];
$totalprice = ($requireofcart*$priceofcart);



if(empty($noofprinter) || empty($year)) {
    echo '<script type="text/javascript">alert("Please add a row and enter the values to generate report");</script>';
} else {

$sql = "INSERT INTO `dj`.`cartridge` (`model`, `noofprinter`, `year`, `noofcarinstock`, `yearlycons`, `qtrlycons`, `balance`, `requireofcart`, 
`priceofcart`, `totalprice`) VALUES ('$model', '$noofprinter', '$year', '$noofcarinstock', '$yearlycons', '$qtrlycons', '$balance', 
'$requireofcart', '$priceofcart', '$totalprice');";
// echo $sql;

if($conn->query($sql)==true){
    //echo "successfully inserted";
}
else{
    echo "ERROR: $sql <br> $conn->error";
}
$conn->close();
}
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Cartridge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="style.css">
    <script src="indexing.js"></script>
    
</head>

<body>
    <!-- navbar begin -->
    <ul>
        <li><a href="index.php" style="width:700px">Inventory Management</I></a></li>
        <li style="float:right"><a style="width:100px" href="generate.php">I-Report</a></li>
        <li style="float:right"><a style="width:90px" href="index.php">I-Table</a></li>
        <li style="float:right"><a style="width:110px" href="graph.php">C-Graph</a></li>
        <li style="float:right"><a style="width:110px" href="generate1.php">C-Report</a></li>
        <li style="float:right"><a style="width:100px" href="index1.php">C-Table</a></li>
        <li style="float:right"><a style="width:100px" href="home.php">Home</a></li>
    </ul>
    <!-- navbar end -->

    <div class="container">
        <h2 style="text-align: center;">Cartridge Management</h2>
        <form action="index1.php" method="post" onsubmit="return validateForm()">
            <table id="cartridge-info" class="table table-hover" style="border:1px solid black;">
                <thead id="head">
                    <tr>
                        <th class="p-3 mb-2 bg-success text-light">Make/Model of Printer</th>
                        <th class="p-3 mb-2 bg-success text-light">No of Printer</th>
                        <th class="p-3 mb-2 bg-success text-light">Vintage of Printer(8 yrs of life span for being outlived)</th>
                        <th class="p-3 mb-2 bg-success text-light">Number of cartridges in stock as on date</th>
                        <th class="p-3 mb-2 bg-success text-light">Yearly Consumption</th>
                        <th class="p-3 mb-2 bg-success text-light">Qtrly Consumption</th>
                        <th class="p-3 mb-2 bg-success text-light">Balance stock on 31 mar 2023</th>
                        <th class="p-3 mb-2 bg-success text-light">Requirement of cartridges for next FY(2023-24) as per life cycle of the Printer</th>
                        <th class="p-3 mb-2 bg-success text-light">Price of cartridge (one unit)</th>
                        <th class="p-3 mb-2 bg-success text-light">Total Prise for one year Consumption</th>
                        <th class="p-3 mb-2 bg-success text-light">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                </tbody>
            </table>

            <div class="reportbtn">
                <button class="btn" name="submit">Submit Information</button>
            </div>
        </form>
        <br>
        <div class='reportbtn'>
            <button class="btn" onclick="addRow()">Enter Information</button>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © 2023 | Made by Dhananjay</p>
    </div>
</body>

</html>