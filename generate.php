<html>

<head>
    <title>Inventory Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        margin-top: 10%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: black;
    }

    li {
        float: left;
        /* border-right:1px solid #bbb; */
    }

    li:last-child {
        border-right: none;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: large;
    }

    li a:hover:not(.active) {
        background-color: #111;
    }
            /* footer */
            .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 8%;
            padding: 4px;
            background-color: black;
            color: white;
            text-align: center;
            font-size: 20px;
        }
    
        .card-text {
            padding: 10px;
        }
    
        .card {
            margin-top: 5%;
            margin-left: 10%;
            margin-right: 10%;
        }
    
        /* footer */
    </style>

</head>


<body>
    <!-- navbar start -->

    <ul>
        <li><a href="index.php" style="width:700px">Inventory Management</I></a></li>
        <li style="float:right"><a style="width:100px" href="generate1.php">I-Report</a></li>
        <li style="float:right"><a style="width:100px" href="index.php">I-Table</a></li>
        <li style="float:right"><a style="width:110px" href="generate.php">C-Report</a></li>
        <li style="float:right"><a style="width:100px" href="index1.php">C-Table</a></li>
        <li style="float:right"><a style="width:100px" href="home.php">Home</a></li>
    </ul>

    <!-- navbar end -->

    <div class="container" style="text-align: center;">
    <h2 style="text-align: center; padding:10px;">Cartridge Management Report</h2>
        <table style="margin-top:5%;">
            <tr>
                <th class=" bg-success text-light">Type of Asset</th>
                <th class=" bg-success text-light">Vintage of equipment(8 yrs of life span for being outlived)
                </th>
                <th class=" bg-success text-light">Qty</th>
                <th class=" bg-success text-light">Authorization</th>
                <th class=" bg-success text-light">Qty held as on date</th>
                <th class=" bg-success text-light">Surplus</th>
                <th class=" bg-success text-light">Deficiency</th>
                <th class=" bg-success text-light">Qty to be procured as per life cycle of the eqpt</th>
                <th class=" bg-success text-light">Total qty to be procure</th>
                <th class=" bg-success text-light">Cost of the items as on date</th>
                <th class=" bg-success text-light">Total cost of the items</th>
            </tr>

    <?php
        include('conn.php');

        // Fetch data from the table
        $query = "SELECT * FROM inventory_table";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }
    
    
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["nameofasset"] . "</td>";
            echo "<td>" . $row["year"] . "</td>";
            echo "<td>" . $row["qty"] . "</td>";
            echo "<td>" . $row["authorization"] . "</td>";
            echo "<td>" . $row["qtyashelddate"] . "</td>";
            echo "<td>" . $row["surplus"] . "</td>";
            echo "<td>" . $row["deficiency"] . "</td>";
            echo "<td>" . $row["qtyprocured"] . "</td>";
            echo "<td>" . $row["totalqty"] . "</td>";
            echo "<td>" . $row["cost"] . "</td>";
            echo "<td>" . $row["totalcost"] . "</td>";
            echo "</tr>";
        }
    
    ?>
        </table>
        <a class="downloadbtn" href="down_Excel.php">Download</a>
    </div>
    <div class="footer">
        <p>Copyright © 2023 | Made by Dhananjay</p>
    </div>
</body>

</html>