<?php
error_reporting(0);
include('conn.php');

 // Fetch data from the table
    $query = "SELECT * FROM cartridge";
    $result = mysqli_query($conn, $query);
    if (!$result) {
    die("Error: " . mysqli_error($conn));
    }

 // Download the report as a CSV file
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=Cartridge.csv");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = fopen("php://output", "w");
    fputcsv($output, array("model","noofprinter", "year","noofcarinstock","yearlycons","qtrlycons","balance","requireofcart","priceofcart","totalprice"));

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    fclose($output);

    // Close the connection
    mysqli_close($conn);
?>