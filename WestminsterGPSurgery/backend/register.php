// W1863171 - Chloe Carson
<?php
// Include the database connection file
include_once 'dbconnection.php';

// Fetch form data
$nhsNumber = $_POST['nhs-number'];
$forename = $_POST['forename'];
$surname = $_POST['surname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];

// Check if the patient is already registered
$sql_check_registered = "SELECT * FROM patients WHERE NHSNumber = '$nhsNumber'";
$result_check_registered = mysqli_query($conn_gpsurgery, $sql_check_registered);

if (mysqli_num_rows($result_check_registered) > 0) {
    // Patient is already registered
    echo "Patient with NHS number $nhsNumber is already registered.";
} else {
    // Proceed with registration
    // Check if the patient's details match the data in the vaccines database
    $sql_check_match = "SELECT * FROM patients WHERE NHSNumber = '$nhsNumber' AND Forename = '$forename' AND Surname = '$surname' 
            AND PersonDOB = '$dob' AND GenderCode = '$gender' AND Postcode = '$postcode'";
    $result_check_match = mysqli_query($conn_vaccines, $sql_check_match);

    if (mysqli_num_rows($result_check_match) > 0) {
        // Patient's details match the data in the vaccines database, proceed with registration
        // Insert patient data into GP Surgery database
        $sql_register_patient = "INSERT INTO patients (NHSNumber, Forename, Surname, PersonDOB, GenderCode, Address, Postcode, MobileNumber, Password) 
        VALUES ('$nhsNumber', '$forename', '$surname', '$dob', '$gender', '$address', '$postcode', '$mobile', '$password')";
        mysqli_query($conn_gpsurgery, $sql_register_patient);
        
        // Retrieve data from the vaccines database
        $sql = "SELECT * FROM vaccines WHERE NHSNumber = '$nhsNumber'";
        $result = mysqli_query($conn_vaccines, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Loop through the results and insert into the medical_records table in the gpsurgery database
            while ($row = mysqli_fetch_assoc($result)) {
                $sql_insert = "INSERT INTO medical_records (NHSNumber, DoseNo, VaccinationDate, VaccineManufacturer, DiseaseTargeted, 
                    VaccineType, Product, VaccineBatchNumber, CountryOfVaccination, Authority, Site, TotalSeriesOfDoses, 
                    DisplayName, SnomedCode, DateEntered, ProcedureCode, Booster) 
                    VALUES ('" . $row['NHSNumber'] . "', '" . $row['DoseNo'] . "', '" . $row['VaccinationDate'] . "', '" . $row['VaccineManufacturer'] . "', '" . $row['DiseaseTargeted'] . "', 
                    '" . $row['VaccineType'] . "', '" . $row['Product'] . "', '" . $row['VaccineBatchNumber'] . "', '" . $row['CountryOfVaccination'] . "', '" . $row['Authority'] . "', 
                    '" . $row['Site'] . "', '" . $row['TotalSeriesOfDoses'] . "', '" . $row['DisplayName'] . "', '" . $row['SnomedCode'] . "', '" . $row['DateEntered'] . "', 
                    '" . $row['ProcedureCode'] . "', '" . $row['Booster'] . "')";
                mysqli_query($conn_gpsurgery, $sql_insert);
            }
            echo "Medical records populated successfully.";
        } else {
            echo "No records found in the vaccines database for the specified NHS number.";
        }

       

        echo "Registration successful.";
    } else {
        // Patient's details do not match the data in the vaccines database
        echo "Patient details do not match records in the vaccines database. Please check and try again.";
    }
}

// Close database connections
mysqli_close($conn_gpsurgery);
mysqli_close($conn_vaccines);
?>
