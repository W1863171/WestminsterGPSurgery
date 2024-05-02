// W1863171 - Chloe Carson
<?php
session_start();

// Check if doctor is logged in
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to index page if not logged in
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard - GP Surgery</title>
    <link rel="stylesheet" href="css/govuk-frontend-5.3.1.min.css">
    <style>
        .table-container {
            overflow-x: auto;
            max-width: 100%;
        }
    </style>
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
                    <h1 class="govuk-heading-xl">Doctor Dashboard</h1>
                    <!-- Search form for NHS number -->
                    <form id="search-form" class="govuk-!-margin-bottom-8">
                        <div class="govuk-grid-row">
                            <div class="govuk-grid-column-two-thirds">
                                <label class="govuk-label" for="search-nhs-number">Search by NHS Number:</label>
                                <input class="govuk-input" id="search-nhs-number" type="text" placeholder="Enter NHS Number">
                            </div>
                            <div class="govuk-grid-column-one-third">
                                <button class="govuk-button" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <!-- Table to display patients' medical records -->
                    <div class="govuk-grid-row">
                        <div class="govuk-grid-column-full">
                            <h2 class="govuk-heading-m">Patients' Medical Records</h2>
                            <div class="table-container">
                                <table class="govuk-table">
                                    <!-- Table headers -->
                                    <thead class="govuk-table__head">
                                        <tr class="govuk-table__row">
                                        <th scope="col" class="govuk-table__header">Record ID</th>
                                        <th scope="col" class="govuk-table__header">NHS Number</th>
                                        <th scope="col" class="govuk-table__header">Dose No</th>
                                        <th scope="col" class="govuk-table__header">Vaccination Date</th>
                                        <th scope="col" class="govuk-table__header">Vaccine Manufacturer</th>
                                        <th scope="col" class="govuk-table__header">Disease Targeted</th>
                                        <th scope="col" class="govuk-table__header">Vaccine Type</th>
                                        <th scope="col" class="govuk-table__header">Product</th>
                                        <th scope="col" class="govuk-table__header">Vaccine Batch Number</th>
                                        <th scope="col" class="govuk-table__header">Country of Vaccination</th>
                                        <th scope="col" class="govuk-table__header">Authority</th>
                                        <th scope="col" class="govuk-table__header">Site</th>
                                        <th scope="col" class="govuk-table__header">Total Series of Doses</th>
                                        <th scope="col" class="govuk-table__header">Display Name</th>
                                        <th scope="col" class="govuk-table__header">Snomed Code</th>
                                        <th scope="col" class="govuk-table__header">Date Entered</th>
                                        <th scope="col" class="govuk-table__header">Procedure Code</th>
                                        <th scope="col" class="govuk-table__header">Booster</th>
                                        </tr>
                                    </thead>
                                    <tbody class="govuk-table__body">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
        </div>
    </main>
    <footer class="govuk-footer" role="contentinfo">
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchForm = document.getElementById("search-form");
            const searchInput = document.getElementById("search-nhs-number");
            const tableBody = document.querySelector(".govuk-table__body");

            searchForm.addEventListener("submit", function(event) {
                event.preventDefault();
                const searchTerm = searchInput.value.trim();

                // Clear previous search results
                tableBody.innerHTML = "";

                // Make AJAX request to fetch patient's medical records
                fetch(`backend/get_patient_medical_records.php?nhs_number=${searchTerm}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const medicalRecords = data.medicalRecords;
                            if (medicalRecords.length > 0) {
                                medicalRecords.forEach(record => {
                                    const row = document.createElement("tr");
                                    row.classList.add("govuk-table__row");

                                    // Iterate through each column and add a cell to the row
                                    Object.values(record).forEach(value => {
                                        const cell = createTableCell(value);
                                        row.appendChild(cell);
                                    });

                                    tableBody.appendChild(row);
                                });
                            } else {
                                // Display message for no medical records found
                                const row = document.createElement("tr");
                                row.innerHTML = "<td colspan='18'>" + data.message + "</td>"; 
                                tableBody.appendChild(row);
                            }
                        } else {
                            console.error("Error:", data.message);
                        }
                    })
                    .catch(error => console.error("Error:", error));
            });

            function createTableCell(value) {
                const cell = document.createElement("td");
                cell.classList.add("govuk-table__cell");
                cell.textContent = value;
                return cell;
            }

            function logout() {
                sessionStorage.clear();
                // Redirect to index page
                window.location.href = "index.html";
            }
        });
    </script>
</body>
</html>
