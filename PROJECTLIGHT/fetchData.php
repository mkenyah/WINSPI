<?php
// fetchData.php


// Database connection setup
$servername = "localhost";
$dbname = "PROJECTLIGHT";
$dbusername = "root";
$dbpassword = "";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch sales data
$salesData = [];
$salesDates = [];
$salesQuery = "SELECT sale_date, SUM(quantity_sold * kshSold) AS total_sales FROM sales WHERE DATE(sale_date) = CURDATE() GROUP BY sale_date ORDER BY sale_date ASC";
$salesResult = $conn->query($salesQuery);
if ($salesResult) {
    while ($row = $salesResult->fetch_assoc()) {
        $salesDates[] = date('H:i', strtotime($row['sale_date'])); // Format time only
        $salesData[] = $row['total_sales'];
    }
}

// Fetch stock data
$stockData = [];
$productNames = [];
$stockQuery = "SELECT product_name, quantity FROM products";
$stockResult = $conn->query($stockQuery);
if ($stockResult) {
    while ($row = $stockResult->fetch_assoc()) {
        $productNames[] = $row['product_name'];
        $stockData[] = $row['quantity'];
    }
}

// Fetch profit data by category
$profitData = [];
$profitLabels = [];
$profitQuery = "SELECT category, SUM((kshSold - price_per_bottle) * quantity_sold) AS profit FROM sales WHERE DATE(sale_date) = CURDATE() GROUP BY category";
$profitResult = $conn->query($profitQuery);
if ($profitResult) {
    while ($row = $profitResult->fetch_assoc()) {
        $profitLabels[] = $row['category'];
        $profitData[] = $row['profit'];
    }
}

// Return the data as JSON
echo json_encode([
    'salesData' => $salesData,
    'salesDates' => $salesDates,
    'stockData' => $stockData,
    'productNames' => $productNames,
    'profitData' => $profitData,
    'profitLabels' => $profitLabels
]);

$conn->close();
?>
