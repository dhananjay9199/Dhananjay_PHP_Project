<?php


?>

<html>

<head>
    <title>Cartridge Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    <style>

    .downloadbtn {
        background-color: aqua;
        color: black;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 20px;
    }

    .downloadbtn:hover {
        background-color: sha384-EVSTQN3;
        /* Change background color on hover */
    }

    .container {
        width: 80%;
        margin: 0 auto;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 5%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
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

    <div class="container" style="text-align: center;">
    <h2 style="text-align: center; padding:10px;">Cartridge Management Report</h2>
        <table style="margin-top:5%;">
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
                    </tr>

    <?php
        include('conn.php');

        // Fetch data from the table
        $query = "SELECT * FROM cartridge";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }

    
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["model"] . "</td>";
            echo "<td>" . $row["noofprinter"] . "</td>";
            echo "<td>" . $row["year"] . "</td>";
            echo "<td>" . $row["noofcarinstock"] . "</td>";
            echo "<td>" . $row["yearlycons"] . "</td>";
            echo "<td>" . $row["qtrlycons"] . "</td>";
            echo "<td>" . $row["balance"] . "</td>";
            echo "<td>" . $row["requireofcart"] . "</td>";
            echo "<td>" . $row["priceofcart"] . "</td>";
            echo "<td>" . $row["totalprice"] . "</td>";
            echo "</tr>";
        }
    
    ?>
        </table>
        <a class="downloadbtn" href="down_report.php">Download</a>
    </div>
    <div class="footer">
        <p>Copyright © 2023 | Made by Dhananjay</p>
    </div>
</body>

</html>