// W1863171 - Chloe Carson
<?php
// Include the database connection file
include_once 'dbconnection.php';

// Start session 
session_start();

// Check if the patient is logged in
if (!isset($_SESSION['nhs-number'])) {
    // Redirect to the login page if not logged in
    header("Location: ../patient-login.html");
    exit();
}

// Fetch patient's information from the GP Surgery database
$patientId = $_SESSION['nhs-number'];
$sql = "SELECT * FROM patients WHERE NHSNumber = '$patientId'";
$result = mysqli_query($conn_gpsurgery, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    // Display patient's information
    echo "<script>
            document.getElementById('nhs-number').innerText = '{$row['NHSNumber']}';
            document.getElementById('forename').innerText = '{$row['Forename']}';
            document.getElementById('surname').innerText = '{$row['Surname']}';
            document.getElementById('dob').innerText = '{$row['PersonDOB']}';
            document.getElementById('gender').innerText = '{$row['GenderCode']}';
            document.getElementById('postcode').innerText = '{$row['Address']}';
            document.getElementById('postcode').innerText = '{$row['Postcode']}';
            document.getElementById('mobile').innerText = '{$row['Mobile']}';
         </script>";
} else {
    // Handle error if patient's information is not found
    echo "Error: Patient information not found.";
}

// Close database connection
mysqli_close($conn_gpsurgery);
?>
