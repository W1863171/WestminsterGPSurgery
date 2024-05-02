// W1863171 - Chloe Carson
<?php
// Include the database connection file
include_once 'dbconnection.php';
session_start();
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialise variables with form data
    $username = $_POST['username'];
    $password = $_POST['password'];



    // SQL query to fetch doctor from database
    $sql = "SELECT * FROM doctors WHERE Username = '$username' AND Password = '$password'";

    // Execute the query
    $result = mysqli_query($conn_gpsurgery, $sql);

    // Check if query executed successfully and doctor exists
    if ($result && mysqli_num_rows($result) > 0) {
        // Valid credentials, create session
        $_SESSION['logged_in'] = true;
        // Doctor exists, redirect to doctor dashboard or desired page
        header("Location: ../doctordashboard.php");
        exit();
    } else {
        // Doctor doesn't exist or incorrect credentials
        echo "<script>alert('Invalid username or password. Please try again.')</script>";
    }
}
?>
