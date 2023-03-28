<?php

error_reporting(0);

$link = mysqli_connect("localhost", "root", "");

mysqli_select_db($link, "dj");

$test=array();

$count=0; 
$res = mysqli_query($link, "select * from cartridge"); 
while ($row=mysqli_fetch_array($res)){
    $test [$count]["label"]=$row["model"]; 
    $test [$count]["y"]=$row["totalprice"];

    $count=$count+1;
}


?>
<!DOCTYPE HTML>
<html>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Simple Column Chart for a Cartridge Management"
            },
            axisY: {
                includeZero: true
            },
            data: [{
                type: "column", //change type to bar, line, area, pie, etc
                //indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
    </script>
    <style>
        #chartContainer{
            margin-top: 5%;
        }
    </style>

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


    <div id="chartContainer" style="height: 450px; width: 100%;"></div>

    <!-- Copyright Start -->
    <div class="footer">
        <p>Copyright © 2023 | Made by Dhananjay</p>
    </div>
    <!-- Copyright End -->

</body>

</html>