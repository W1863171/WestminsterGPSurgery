// W1863171 - Chloe Carson
<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include_once "dbconnection.php";

    // Get the input values from the form
    $nhs_number = $_POST["nhs_number"];
    $password = $_POST["password"];

    // Prepare a SQL statement to check if the patient exists
    $sql = "SELECT * FROM patients WHERE NHSNumber = ? AND password = ?";
    $stmt = $conn_gpsurgery->prepare($sql);
    $stmt->bind_param("ss", $nhs_number, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the patient exists and the password is correct
    if ($result->num_rows == 1) {
        // Fetch the patient data
        $row = $result->fetch_assoc();

        // Store the patient data in session variables
        $_SESSION["nhs-number"] = $row["NHSNumber"];
      
        // Redirect to the patient dashboard 
        header("Location: ../patientdashboard.php");
        exit();
    } else {
        // Redirect back to the login page with an error message
        header("Location: ../patient-login.html?error=invalid_credentials");
        exit();
    }
} else {
    // Redirect back to the login page if the form is not submitted
    header("Location: patient-login.html");
    exit();
}
?>
