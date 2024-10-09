<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Function to read Excel data and return as an array
function readExcelData($file)
{
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    $data = [];

    $columns = ['C', 'D', 'E', 'F', 'G', 'S', 'AD', 'AE', 'AF', 'L', 'M', 'N','R','AC','S','T','U','V','W','X','Y','Z','AA','AB','AC']; // Added 'L' for training_institution_type
    foreach ($sheet->getRowIterator(7) as $row) { // Start from the 7th row
        $rowData = [];
        foreach ($columns as $column) {
            $cell = $sheet->getCell($column . $row->getRowIndex());
            $rowData[$column] = $cell->getFormattedValue(); // Use getFormattedValue() to get formatted cell value
        }
        $data[] = $rowData;
    }

    return $data;
}

// Function to save data to the database
function saveToDatabase($data)
{
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "excel_data";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO excel_data (
        last_name, first_name, middle_name, extension, qualification, certificate_number, date_of_issuance, validity, sector, training_institution_type, email, phone_number, provincecode, control_number, nc_number, nc_date_of_issuance, nc_validity_date, tm_number, tm_date_of_issuance, tm_validity_date, assessor1, assessor2, assessor3
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("sssssssssssssssssssssss", 
        $last_name, $first_name, $middle_name, $extension, $qualification, 
        $certificate_number, $date_of_issuance, $validity, $sector, $training_institution_type, 
        $email, $phone_number, $provincecode, $control_number, $nc_number, 
        $nc_date_of_issuance, $nc_validity_date, $tm_number, $tm_date_of_issuance, 
        $tm_validity_date, $assessor1, $assessor2, $assessor3
    );
    
    // Insert each row of data
    foreach ($data as $row) {
        $last_name = $row['D'];
        $first_name = $row['E'];
        $middle_name = $row['F'];
        $extension = $row['G'];
        $qualification = $row['S'];
        $certificate_number = $row['AD'];
        $date_of_issuance = date('F j, Y', strtotime($row['AE']));
        $validity = date('F j, Y', strtotime($row['AF']));
        $sector = $row['R'];
        $training_institution_type = $row['L'];
        $email = $row['M'];
        $phone_number = $row['N'];
        $provincecode = $row['C'];
        $control_number = $row['AC'];
        $nc_number = $row['T'];
        $nc_date_of_issuance = $row['U'];
        $nc_validity_date = $row['V'];
        $tm_number = $row['W'];
        $tm_date_of_issuance = $row['X'];
        $tm_validity_date = $row['Y'];
        $assessor1 = $row['Z'];
        $assessor2 = $row['AA'];
        $assessor3 = $row['AB'];
    
        $stmt->execute();
    }
    
    

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

// Function to process file upload and save data
function processFileUpload()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
        $file = $_FILES['file']['tmp_name'];
        $allData = readExcelData($file);

        // Save data to database
        saveToDatabase($allData);

        // Return the data to display
        return $allData;
    }
}

// Function to generate table rows with date color formatting
function generateTableRows($data)
{
    foreach ($data as $rowData) {
        echo '<tr>';
        foreach ($rowData as $key => $value) {
            // Check if the current column is "Validity"
            if ($key === 'AF') {
                // Check if the date has already passed
                if (strtotime($value) < strtotime('today')) {
                    // Date has passed, color it red and bold
                    echo '<td style="color: red; font-weight: bold;">' . htmlspecialchars($value) . '</td>';
                } else {
                    // Check if the date is within 3 months from now
                    $threeMonthsLater = date('Y-m-d', strtotime('+3 months'));
                    if (strtotime($value) <= strtotime($threeMonthsLater)) {
                        // Date is within 3 months, color it orange and bold
                        echo '<td style="color: orange; font-weight: bold;">' . htmlspecialchars($value) . '</td>';
                    } else {
                        // Date is normal, display it without formatting
                        echo '<td>' . htmlspecialchars($value) . '</td>';
                    }
                }
            } else {
                // For other columns, display data without formatting
                echo '<td>' . htmlspecialchars($value) . '</td>';
            }
        }
        echo '</tr>';
    }
}

// Call the function to process file upload and get the data
$allData = processFileUpload();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Data</title>

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .search-button:hover {
            transform: scale(1.1);
        }

        .search-button {
            transition: transform 0.3s ease;
        }

        .lock-button {
            margin-left: 5px;
        }

        .redirect-button {
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            margin-left: 10px;
            cursor: pointer;
        }

        .redirect-button.enabled {
            background: linear-gradient(90deg, blue, black);
            border: 2px solid white;
            color: white;
            pointer-events: auto;
        }

        .redirect-button.disabled {
            background: linear-gradient(90deg, lightgrey, darkgrey);
            border: 2px solid grey;
            color: grey;
            pointer-events: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 220px;
            height: 100px;
            margin-right: 10px;
            display: inline-block;
        }

        .header h1 {
            margin: -5px 0 0;
        }

        .search-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            flex: 1;
        }

        .search-container button {
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            margin-left: 5px;
            cursor: pointer;
        }

        .search-container button i {
            color: white;
        }

        @media (max-width: 768px) {
            .search-container {
                flex-direction: column;
                align-items: stretch;
            }

            .search-container button {
                margin-top: 10px;
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="icons/both.png" alt="Logo">
        <h1>NTTC Monitoring System</h1>
    </div>

    <div class="search-container">
        <input type="text" id="searchInput" onkeyup="searchOnEnter(event)" placeholder="Search...">
        <button onclick="searchTable()" class="search-button">
            <i class="fas fa-search"></i>
        </button>
        <button id="lockButton" onclick="lockInData()" class="lock-button"
                style="background: linear-gradient(90deg, blue, black); border: 2px solid white; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 10px; font-family: 'Arial', sans-serif; font-weight: bold; margin-left: 10px; cursor: pointer;">
            <i class="fas fa-lock"></i> Lock In
        </button>
        <a id="redirectButton" href="index.php" class="redirect-button disabled">
            <i class="fas fa-arrow-circle-right"></i> Click to Proceed
        </a>
    </div>

    <div class="table-container">
        <table id="dataTable">
            <thead>
            <tr>
                <th>Province</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Extension</th>
                <th>Qualification</th>
                <th>Certificate Number</th>
                <th>Date of Issuance</th>
                <th>Validity</th>
                <th>Training Institution Type</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Sector</th>
                <th>CLN-NTTC</th>
            </tr>
            </thead>
            <tbody>
            <?php generateTableRows($allData); ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function searchTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('dataTable');
        const tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            const tdArray = tr[i].getElementsByTagName('td');
            let isMatched = false;
            for (let j = 0; j < tdArray.length; j++) {
                const td = tdArray[j];
                if (td) {
                    if (td.innerText.toLowerCase().indexOf(filter) > -1) {
                        isMatched = true;
                        break;
                    }
                }
            }
            tr[i].style.display = isMatched ? '' : 'none';
        }
    }

    function searchOnEnter(event) {
        if (event.keyCode === 13) { // 13 is the keycode for Enter key
            searchTable();
        }
    }

    function lockInData() {
        const lockButton = document.getElementById('lockButton');
        const redirectButton = document.getElementById('redirectButton');
        lockButton.style.background = 'linear-gradient(90deg, lightgrey, darkgrey)';
        lockButton.style.border = '2px solid grey';
        lockButton.style.color = 'grey';
        lockButton.style.pointerEvents = 'none';
        redirectButton.classList.remove('disabled');
        redirectButton.classList.add('enabled');
    }
</script>
</body>
</html>
