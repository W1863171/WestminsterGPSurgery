// W1863171 - Chloe Carson
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include_once 'backend/dbconnection.php';

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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard - GP Surgery</title>
    <link rel="stylesheet" href="css/govuk-frontend-5.3.1.min.css">
</head>
<body class="govuk-template__body">
    <header class="govuk-header" role="banner" data-module="header">
        <div class="govuk-header__container govuk-width-container">
            <div class="govuk-header__logo">
                <a href="" class="govuk-header govuk-header__link--homepage">
                    <span class="govuk-header__logotype">
                        <img src="assets/images/govuk-icon-180.png" alt="GOV.UK">
                    </span>
                    <span class="govuk-header__logotype-text">Westminster GP Surgery</span>
                </a>
            </div>
            <div class="govuk-header__content">
                <button class="govuk-button govuk-button--secondary" onclick="logout()">Logout</button>
            </div>
        </div>
    </header>
    <main class="govuk-main-wrapper" id="main-content" role="main">
        <div class="govuk-width-container">
            <div class="govuk-grid-row">
                <div class="govuk-grid-column-two-thirds">
                    <h1 class="govuk-heading-xl">Patient Dashboard</h1>
                    <div class="govuk-grid-row">
                        <div class="govuk-grid-column-one-half">
                            <h2 class="govuk-heading-m">Personal Information</h2>
                            <ul class="govuk-list">
                                <li><strong>NHS Number:</strong> <?php echo $row['NHSNumber']; ?></li>
                                <li><strong>Forename:</strong> <?php echo $row['Forename']; ?></li>
                                <li><strong>Surname:</strong> <?php echo $row['Surname']; ?></li>
                                <li><strong>Date of Birth:</strong> <?php echo $row['PersonDOB']; ?></li>
                                <li><strong>Gender:</strong> <?php echo $row['GenderCode']; ?></li>
                                <li><strong>Postcode:</strong> <?php echo $row['Address']; ?></li>
                                <li><strong>Postcode:</strong> <?php echo $row['Postcode']; ?></li>
                                <li><strong>Mobile Number:</strong> <?php echo $row['MobileNumber']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="govuk-footer" role="contentinfo">
    </footer>
    <script>
    function logout() {
        // Clear session
        sessionStorage.clear();
        // Redirect to login page
        window.location.href = "patient-login.html";
    }
    </script>
</body>
</html>


<?php
// Close database connection
mysqli_close($conn_gpsurgery);
?>
