<?php 
include("conn.php");
error_reporting(0);
?>

<?php
if(isset($_POST['submit'])){

$nameofasset = $_POST['nameofasset'];
$year = $_POST['year'];
$qty = $_POST['qty'];
$authorization = $_POST['authorization'];
$qtyashelddate = $_POST['qtyashelddate'];
// $surplus = $_POST['surplus'];
// $deficiency = $_POST['deficiency'];
$qtyprocured = $_POST['qtyprocured'];
$totalqty = $_POST['totalqty'];
$cost = $_POST['cost'];
// $totalcost = $_POST['totalcost'];

$totalcost = ($totalqty*$cost);

// $surplus and $qtyashelddate calculation
if($authorization > $qtyashelddate){
    $surplus = 0;
    $deficiency = $authorization - $qtyashelddate; 
} else if($authorization < $qtyashelddate){
    $deficiency = 0;
    $surplus = $qtyashelddate - $authorization;
}


if(empty($year) || empty($qty)) {
    echo '<script type="text/javascript">alert("Please add a row and enter the values to generate report");</script>';
} else {

$sql = "INSERT INTO `dj`.`inventory_table` (`nameofasset`, `year`, `qty`, `authorization`, `qtyashelddate`, `surplus`, `deficiency`, `qtyprocured`, 
`totalqty`, `cost`, `totalcost`) VALUES ('$nameofasset', '$year', '$qty', '$authorization', '$qtyashelddate', '$surplus', '$deficiency', 
'$qtyprocured', '$totalqty', '$cost', '$totalcost');";
// echo $sql;

if($conn->query($sql)==true){
    // echo "successfully inserted";
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
    <title>Inventory-Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>

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
        <h2 style="text-align: center;">Inventory Management</h2>
        <form action="index.php" method="post" onsubmit="return validateForm()">
            <table id="inventory-info" class="table table-hover" style="border:1px solid black;">
                <thead id="head">
                    <tr>
                        <th class="p-3 mb-2 bg-success text-light">Type of asset</th>
                        <th class="p-3 mb-2 bg-success text-light">vintage of equipment(8 years of life span for being
                            outlived)</th>
                        <th class="p-3 mb-2 bg-success text-light">qty</th>
                        <th class="p-3 mb-2 bg-success text-light">authorization</th>
                        <th class="p-3 mb-2 bg-success text-light">qty as held on date</th>
                        <th class="p-3 mb-2 bg-success text-light">surplus</th>
                        <th class="p-3 mb-2 bg-success text-light">deficiency</th>
                        <th class="p-3 mb-2 bg-success text-light">Qty to be procured as per life cycle of the eqpt</th>
                        <th class="p-3 mb-2 bg-success text-light">Total qty to be procure</th>
                        <th class="p-3 mb-2 bg-success text-light">Cost of the items as on date</th>
                        <th class="p-3 mb-2 bg-success text-light">Total cost of the items</th>
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