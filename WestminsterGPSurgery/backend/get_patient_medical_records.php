// W1863171 - Chloe Carson
<?php
// Include the database connection file
include_once "dbconnection.php";

// Check if the NHS number is provided in the request
if (isset($_GET['nhs_number'])) {
    // Sanitise the input
    $nhsNumber = mysqli_real_escape_string($conn_gpsurgery, $_GET['nhs_number']);

    // Prepare the SQL statement to fetch medical records for the provided NHS number
    $sql = "SELECT medical_records.*, patients.Forename, patients.Surname 
            FROM medical_records 
            JOIN patients ON medical_records.NHSNumber = patients.NHSNumber 
            WHERE medical_records.NHSNumber = '$nhsNumber'";

    // Execute the SQL statement
    $result = mysqli_query($conn_gpsurgery, $sql);

    // Check if any records are found
    if (mysqli_num_rows($result) > 0) {
        // Fetch all matching records as an associative array
        $medicalRecords = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $medicalRecords[] = $row;
        }

        // Return the records as JSON data
        echo json_encode(['success' => true, 'medicalRecords' => $medicalRecords]);
        exit;
    } else {
        // No records found for the provided NHS number
        echo json_encode(['success' => false, 'message' => 'No medical records found for this NHS number.']);
        exit;
    }
} else {
    // NHS number is not provided in the request
    echo json_encode(['success' => false, 'message' => 'NHS number is required.']);
    exit;
}
?>
