<?php
error_reporting(0);
include('conn.php');

 // Fetch data from the table
    $query = "SELECT * FROM inventory_table";
    $result = mysqli_query($conn, $query);
    if (!$result) {
    die("Error: " . mysqli_error($conn));
    }

 // Download the report as a CSV file
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=Inventory.csv");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = fopen("php://output", "w");
    fputcsv($output, array("assetname","year", "qty","authorization","qty held as on date","surplus","deficiency","qtyprocured","total qty","cost of item", "total cost"));

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    fclose($output);

    // Close the connection
    mysqli_close($conn);
?>