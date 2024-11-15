<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Register.css">
    <title>Register</title>
    <style>

    </style>
</head>

<body>

    <!-- REGISTER FORM LINKED TO PHP LOGREGENGINE -->
    <form action="./logRegEngine.php" method="POST" class="Register_form hidden" id="Register_form" onsubmit="return showConfirmation()">
        <h1>Sign Up</h1>
        <input class="input" name="fullname" type="text" placeholder="Full Name" required>
        <input class="input" name="email" type="email" placeholder="Email" required>
        <input class="input" name="contact" type="tel" placeholder="Contact" required>
        <input class="input" name="username" type="text" placeholder="UserName" required>
        <select class="input" name="role" id="role" onchange="updatePlaceholderAndGenerateId()" required>
            <option value="" disabled selected>User Role</option>
            <option value="Admin">Admin</option>
            <option value="Employee">Employee</option>
        </select>

        <input class="input" type="text" id="id_field" name="user_id" placeholder="Employee Id" required>

        <input class="input" name="password" type="password" placeholder="Password" required>
        <input type="submit" value="Register" class="register_button">

        <h5>Already have an Account? <a href="./login.php">Login</a></h5>
    </form>

    <script>
        // Function to show confirmation alert when form is submitted
        const showConfirmation = () => {
            alert("You are about to submit the registration form.");
            return true;  // Allow the form to be submitted
        };

        // Function to update the placeholder text and generate the ID based on role
        const updatePlaceholderAndGenerateId = () => {
            let role = document.getElementById("role").value;
            let idField = document.getElementById("id_field");

            // Update placeholder based on selected role
            if (role === "Admin") {
                idField.placeholder = "Admin Id";
            } else if (role === "Employee") {
                idField.placeholder = "Employee Id";
            }

            // Generate a unique ID based on role
            if (role) {
                let prefix = role === "Admin" ? "A" : "E";
                let uniqueId = Date.now().toString().slice(-6);
                idField.value = prefix + uniqueId;

                // Alert to show the generated ID
                alert(`Generated ${role} ID: ${idField.value}`);
            } else {
                idField.value = "";
            }
        };
    </script>

</body>

</html>
