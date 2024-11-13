<?php
$servername = "localhost";
$dbname = "PROJECTLIGHT";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// INSERT NEW PRODUCT
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pname = $_POST['pname'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $pprice = $_POST['pprice'];
    $ppbottle = $_POST['ppbottle'];
    $employeeInCharge = $_POST['user_in_charge'];
    $productId = $_POST['productId'];
    $expectedProfit = $_POST['expectedProfit'];
    
    // Calculate the final profit
    $finalProfit = $pprice - $expectedProfit;

    // Prepare SQL statement to insert data
    $sql = "INSERT INTO products (product_name, category, quantity, stock_price, price_per_bottle, user_in_charge, product_id, expected_profit, final_profit)
            VALUES ('$pname', '$category', '$quantity', '$pprice', '$ppbottle', '$employeeInCharge', '$productId', '$expectedProfit', '$finalProfit')";

    if (mysqli_query($conn, $sql)) {
        // Redirect after successful insert
        header("Location: ayour_form_page.php");
    } else {
        // Handle error and provide feedback
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }

    mysqli_close($conn);
}
?>
