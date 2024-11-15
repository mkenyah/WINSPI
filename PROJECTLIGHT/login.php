<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Register.css">
    <title>Login</title>
</head>

<body>
    <form action="login.php" method="POST" class="Login_form" id="Login_form" onsubmit="return validateForm()">
        <h1>Log In</h1>
        <input class="input" type="text" id="username" name="username" placeholder="UserName" required>
        <input class="input" type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Log in" class="login_button">
        <h5>Don't have an Account? <a href="./index.php">Register</a></h5>
    </form>

    <?php
    session_start();

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "PROJECTLIGHT";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $login_username = $conn->real_escape_string($_POST['username']);
            $login_password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE USER_NAME='$login_username'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();

                if (password_verify($login_password, $row['PASSWORD'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $login_username;
                    $_SESSION['role'] = $row['ROLE']; // Store the role in session

                    echo "<script>
                        alert('Login successful');
                    </script>";

                    // Redirect based on the user role
                    if ($row['ROLE'] === 'Admin') {
                        header("Location: admin.php");
                    } else {
                        header("Location: dashboard.php");
                    }
                    exit();
                } else {
                    echo "<script>
                        alert('Incorrect password. Please try again.');
                    </script>";
                }
            } else {
                echo "<script>
                        alert('Incorrect username. Please check and try again.');
                    </script>";
            }
            
        } else {
            echo "<script>
                    alert('Both fields are required. Please fill out both the username and password fields.');
                </script>";
        }
    }

    $conn->close();
    ?>

    <script>
        // Validate form to check if fields are empty before submitting
        function validateForm() {
            let username = document.getElementById("username").value;
            let password = document.querySelector('input[name="password"]').value;
            
            if (username === "" || password === "") {
                alert("Please enter both username and password.");
                return false;
            }
            return true;
        }
    </script>

</body>

</html>
