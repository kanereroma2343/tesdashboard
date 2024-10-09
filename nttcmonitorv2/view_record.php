<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTTC Information</title>
    <link rel="icon" type="image/png" href="icons/nttcmis.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #000000, #0000FF, #FFFFFF);
            margin: 0;
            padding: 0;
            display: flex;
            transition: margin-left 0.3s;
        }

        .sidebar {
    width: 250px; /* Increased width for better design */
    background: linear-gradient(to bottom, #000000, #0000FF, #FFFFFF); /* Gradient background */
    color: #FFFFFF; /* White text */
    position: fixed;
    height: 100%;
    padding: 20px;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.7); /* Enhanced shadow */
    left: -250px; /* Hide sidebar off-screen */
    transition: left 0.3s;
    overflow-y: auto; /* Allow scrolling if content overflows */
}

.sidebar:hover {
    left: 0; /* Show sidebar on hover */
}

.sidebar .logo {
    text-align: center;
    margin-bottom: 20px;
}

.sidebar .logo img {
    width: 40%; /* Adjust width as needed */
    max-width: 180px; /* Ensure logo doesn’t get too large */
    height: auto; /* Maintain aspect ratio */
}

.sidebar h2 {
    text-align: center;
    color: #FFFFFF;
    margin-top: 0;
    font-size: 24px;
    padding-bottom: 20px;
}

.sidebar button {
    width: 100%;
    padding: 12px;
    background: linear-gradient(to right, #0000FF, #00008B); /* Gradient background */
    border: none;
    color: #FFFFFF;
    font-size: 18px;
    margin-bottom: 12px;
    cursor: pointer;
    border-radius: 8px;
    transition: background 0.3s ease, transform 0.3s ease;
}

.sidebar button:hover {
    background: linear-gradient(to right, #00008B, #0000FF); /* Inverted gradient on hover */
    transform: scale(1.05); /* Slight scaling effect */
}
        .container {
            margin-left: 270px; /* Adjusted margin for sidebar width */
            width: 90vh; /* Full width minus sidebar width */
            height: 70%;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out forwards;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        h1 {
            text-align: center;
            color: #000000;
            margin-bottom: 30px;
        }

        .section {
            margin-bottom: 15px;
            border: 2px solid #333;
            border-radius: 8px;
            background-color: #f9f9f9;
            padding: 10px;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #fff;
            background-color: #00008B;
            padding: 8px;
            border-radius: 5px;
            text-align: center;
            border: 2px solid #000000;
            text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
        }

        table td {
            background-color: rgba(255, 255, 255, 0.9);
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        table td:last-child {
            border-bottom: none;
        }

        table td:hover {
            background-color: #f0f8ff;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <img src="icons/nttcmis.png" alt="Logo" />
    </div>
    <h2>Menu</h2>
    <button onclick="location.href='index.php'">Home</button>
    <button onclick="location.href='statistics.php'">Statistics</button>
    <button onclick="location.href='delete.php'">Delete</button>
    <button onclick="location.href='dfr.php'">Due for Renewal</button>
    <button onclick="location.href='ictunitportfolio.php'">ICT Unit</button>
    <button onclick="location.href='privacy_policy.php'">Privacy Policy</button>
    <button onclick="location.href='terms_of_service.php'">NTTC Guidelines</button>
</div>
    <div class="container">
        <?php
        // Enable error reporting
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

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

        // Get parameters from URL
        $last_name = $_GET['last_name'] ?? '';
        $first_name = $_GET['first_name'] ?? '';
        $middle_name = $_GET['middle_name'] ?? '';
        $extension = $_GET['extension'] ?? '';
        $certificate_number = $_GET['certificate_number'] ?? '';

        // Prepare and execute query
        $sql = "SELECT * FROM excel_data WHERE last_name=? AND first_name=? AND middle_name=? AND extension=? AND certificate_number=?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('sssss', $last_name, $first_name, $middle_name, $extension, $certificate_number);
            $stmt->execute();
            $result = $stmt->get_result();

            // Fetch data
            if ($row = $result->fetch_assoc()) {
                echo "<div style='display: flex; align-items: center; justify-content: center; position: relative; margin-bottom: 10px;'>";
                echo "<img src='icons/tlogo.png' alt='Left Logo' style='width: 100px; height: auto;left: 0;'>";
                echo "<h1 style='margin: 0; padding: 0 20px; font-size: 24px; text-align: center;'>Trainer's Profile of " . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</h1>";
                echo "<img src='icons/nttcmis.png' alt='Right Logo' style='width: 75px; height: auto; right: 0;'>";
                echo "</div>";                  
                // Personal Information
                echo "<div class='section'>";
                echo "<div class='section-title'>Personal Information</div>";
                echo "<table>";
                echo "<tr><td><strong>Last Name:</strong> " . htmlspecialchars($row['last_name']) . "</td><td><strong>First Name:</strong> " . htmlspecialchars($row['first_name']) . "</td></tr>";
                echo "<tr><td><strong>Middle Initial:</strong> " . htmlspecialchars($row['middle_name']) . "</td><td><strong>Extension:</strong> " . htmlspecialchars($row['extension']) . "</td></tr>";
                echo "</table>";
                echo "</div>";

                // NTTC Information
                echo "<div class='section'>";
                echo "<div class='section-title'>NTTC Information</div>";
                echo "<table>";
                echo "<tr><td><strong>Certificate Number:</strong> " . htmlspecialchars($row['certificate_number']) . "</td><td><strong>Control Number:</strong> " . htmlspecialchars($row['control_number']) . "</td></tr>";
                echo "<tr><td><strong>Date of Issuance:</strong> " . htmlspecialchars($row['date_of_issuance']) . "</td><td><strong>Validity Date:</strong> " . htmlspecialchars($row['validity']) . "</td></tr>";
                echo "</table>";
                echo "</div>";

                // NC Information
                echo "<div class='section'>";
                echo "<div class='section-title'>NC Information</div>";
                echo "<table>";
                echo "<tr><td><strong>Qualification:</strong> " . htmlspecialchars($row['qualification']) . "</td><td><strong>NC Number:</strong> " . htmlspecialchars($row['nc_number']) . "</td></tr>";
                echo "<tr><td><strong>Date of Issuance:</strong> " . htmlspecialchars($row['nc_date_of_issuance']) . "</td><td><strong>NC Validity Date:</strong> " . htmlspecialchars($row['nc_validity_date']) . "</td></tr>";
                echo "</table>";
                echo "</div>";

                // TM Information
                echo "<div class='section'>";
                echo "<div class='section-title'>TM Information</div>";
                echo "<table>";
                echo "<tr><td><strong>TM Number:</strong> " . htmlspecialchars($row['tm_number']) . "</td><td><strong>TM Date of Issuance:</strong> " . htmlspecialchars($row['tm_date_of_issuance']) . "</td></tr>";
                echo "<tr><td><strong>TM Validity Date:</strong> " . htmlspecialchars($row['tm_validity_date']) . "</td></tr>";
                echo "</table>";
                echo "</div>";

                // Assessor Information
                echo "<div class='section'>";
                echo "<div class='section-title'>Assessor Information</div>";
                echo "<table>";
                echo "<tr><td><strong>Assessor 1:</strong> " . htmlspecialchars($row['assessor1']) . "</td><td><strong>Assessor 2:</strong> " . htmlspecialchars($row['assessor2']) . "</td></tr>";
                echo "<tr><td><strong></strong></td><td><strong>Assessor 3:</strong> " . htmlspecialchars($row['assessor3']) . "</td></tr>";
                echo "</table>";
                echo "</div>";

            } else {
                echo "<p>Record not found.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>Error preparing statement: " . htmlspecialchars($conn->error) . "</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
