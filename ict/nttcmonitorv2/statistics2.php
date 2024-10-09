<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTTC Statistics</title>
    <link rel="icon" type="image/png" href="icons/nttcmis.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <style>
    /* General styles */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #FFFFFF, #0000FF, #000000);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        opacity: 0; /* Start with opacity 0 for fade-in effect */
        transition: opacity 0.8s ease; /* Smooth transition effect */
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .logo-container {
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
    }

    .logo-container img {
        width: 220px;
        height: auto;
    }

    h2, h3 {
        margin-bottom: 20px;
        text-align: center;
        color: #333333;
    }

    .content {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
    }

    .left-column, .right-column {
        width: 48%;
    }

    /* Table styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 10px;
        text-align: center;
        border: 1px solid #dddddd;
    }

    th {
        background-color: #3498db; /* Light blue */
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2; /* Lighter background for even rows */
    }

    tr:hover {
        background-color: #2980b9; /* Darker blue on hover */
        color: white;
    }

    /* Chart canvas */
    canvas {
        max-width: 100%;
        max-height: 300px;
        margin: auto;
        display: block;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container {
            width: 95%;
        }

        .content {
            flex-direction: column;
        }

        .left-column, .right-column {
            width: 100%;
        }
    }

    /* Header buttons */
    .header-buttons {
        text-align: center;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .header-buttons a {
        background-color: #0000FF; /* Blue */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 10px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 70%; /* Adjust width as needed */
        max-width: 400px; /* Set a maximum width */
        animation-name: modalopen;
        animation-duration: 0.3s;
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Soft shadow */
    }

    @keyframes modalopen {
        0% {transform: scale(0.7); opacity: 0;}
        100% {transform: scale(1); opacity: 1;}
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Table-chart container */
    .table-chart-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        width: 100%;
    }

    .table-chart-container .left-column, 
    .table-chart-container .right-column {
        width: 48%;
    }
    .tables-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start; /* Align items at the start of the flex container */
        width: 100%;
        gap: 20px; /* Add some space between the tables */
    }
    .sector-table-container, 
    .qualification-table-container {
        flex: 1; /* Allow tables to grow equally */
        max-width: 48%; /* Adjust width as needed to fit side by side */
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
    }
    sector-table, 
    .qualification-table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: #3498db; /* Light blue */
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2; /* Lighter background for even rows */
    }

    tr:hover {
        background-color: #2980b9; /* Darker blue on hover */
        color: white;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .tables-container {
            flex-direction: column;
            gap: 0; /* Remove gap between tables on small screens */
        }

        .sector-table-container, 
        .qualification-table-container {
            max-width: 100%; /* Full width on small screens */
            margin-bottom: 20px; /* Add space between stacked tables */
        }
    }
    /* Sector table styles */
    /* Screenshot button */
    #screenshotButton {
        background-color: #0000FF; /* Blue */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 10px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    #screenshotButton:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }
</style>

</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="icons/both.png" alt="NTTC Logo">
            <img src="icons/nttcmis.png" alt="Logo" style="width: 100px; height: 100px; margin-right: 10px; display: inline-block;">
        </div>
        <div class="header-buttons">
            <a href="index.php">Home</a>
            <a href="#" id="infoButton">Info</a>   
            <a href="statistics.php">Statistics</a>   
            <button id="screenshotButton">Screenshot</button>   
        </div>
      <div class="table-chart-container">
    <div class="left-column">
        <h2>NTTC Warm Bodies</h2>
        <table>
            <thead>
                <tr>
                    <th>Province</th>
                    <th>Warm Bodies Count</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // PHP logic for fetching count of unique names per province from database
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

                // Query to fetch count of unique names per province
                $sql_cebu = "SELECT COUNT(DISTINCT CONCAT(first_name, ' ', middle_name, ' ', last_name)) AS num_unique_cebu 
                             FROM excel_data 
                             WHERE SUBSTRING(certificate_number, 7, 2) = '22'";
                $sql_bohol = "SELECT COUNT(DISTINCT CONCAT(first_name, ' ', middle_name, ' ', last_name)) AS num_unique_bohol 
                              FROM excel_data 
                              WHERE SUBSTRING(certificate_number, 7, 2) = '12'";
                $sql_siquijor = "SELECT COUNT(DISTINCT CONCAT(first_name, ' ', middle_name, ' ', last_name)) AS num_unique_siquijor 
                                 FROM excel_data 
                                 WHERE SUBSTRING(certificate_number, 7, 2) = '61'";
                $sql_negros = "SELECT COUNT(DISTINCT CONCAT(first_name, ' ', middle_name, ' ', last_name)) AS num_unique_negros 
                               FROM excel_data 
                               WHERE SUBSTRING(certificate_number, 7, 2) = '46'";

                // Execute queries
                $result_cebu = $conn->query($sql_cebu);
                $result_bohol = $conn->query($sql_bohol);
                $result_siquijor = $conn->query($sql_siquijor);
                $result_negros = $conn->query($sql_negros);

                // Fetch results
                $num_unique_cebu = $result_cebu->fetch_assoc()["num_unique_cebu"] ?? 0;
                $num_unique_bohol = $result_bohol->fetch_assoc()["num_unique_bohol"] ?? 0;
                $num_unique_siquijor = $result_siquijor->fetch_assoc()["num_unique_siquijor"] ?? 0;
                $num_unique_negros = $result_negros->fetch_assoc()["num_unique_negros"] ?? 0;

                // Calculate total
                $total_warm_bodies = $num_unique_cebu + $num_unique_bohol + $num_unique_siquijor + $num_unique_negros;

                // Display results in table rows
                echo "<tr><td>Cebu</td><td>$num_unique_cebu</td></tr>";
                echo "<tr><td>Bohol</td><td>$num_unique_bohol</td></tr>";
                echo "<tr><td>Siquijor</td><td>$num_unique_siquijor</td></tr>";
                echo "<tr><td>Negros</td><td>$num_unique_negros</td></tr>";
                echo "<tr><td><strong>Total</strong></td><td><strong>$total_warm_bodies</strong></td></tr>";

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <div class="right-column">
        <h2>NTTC Graph</h2>
        <canvas id="myBarChartProvinces" style="max-width: 100%; max-height: 300px; margin: auto; display: block; float: right;"></canvas>
        <div class="modal" id="infoModal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>This page shows the Warm Bodies Count of NTTC in the following provinces:</p>
                <ul>
                    <li>Cebu</li>
                    <li>Bohol</li>
                    <li>Siquijor</li>
                    <li>Negros</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<h2>Sector Graph</h2>
<canvas id="myBarChartSectors"></canvas>
<div class="tables-container">
    <!-- Sector Table -->
    <div class="sector-table-container">
        <h2>NTTC Trainers per Sector</h2>
        <table class="sector-table">
            <thead>
                <tr>
                    <th>Sector</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // PHP logic for fetching sector data from the database
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to fetch count of unique sectors
                $sql_sector = "SELECT sector, COUNT(*) AS sector_count FROM excel_data GROUP BY sector";
                $result_sector = $conn->query($sql_sector);

                // Initialize total count
                $total_count = 0;

                // Fetch and display results
                if ($result_sector->num_rows > 0) {
                    $sectors = [];
                    $sector_counts = [];
                    while($row = $result_sector->fetch_assoc()) {
                        $sectors[] = $row["sector"];
                        $sector_counts[] = $row["sector_count"];
                        $total_count += $row["sector_count"]; // Accumulate total count
                        echo "<tr><td>" . $row["sector"] . "</td><td>" . $row["sector_count"] . "</td></tr>";
                    }
                    $sectors_json = json_encode($sectors);
                    $sector_counts_json = json_encode($sector_counts);
                } else {
                    echo "<tr><td colspan='2'>No data available</td></tr>";
                }

                // Display total row
                echo "<tr><td><strong>Total</strong></td><td><strong>" . $total_count . "</strong></td></tr>";

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Qualification Table -->
    <div class="qualification-table-container">
        <h2>Trainers Per Qualifications</h2>
        <table class="qualification-table">
            <thead>
                <tr>
                    <th>Qualification</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // PHP logic for fetching qualification data from the database
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to fetch count of unique qualifications
                $sql_qualification = "SELECT qualification, COUNT(*) AS qualification_count FROM excel_data GROUP BY qualification";
                $result_qualification = $conn->query($sql_qualification);

                // Initialize total count
                $total_count = 0;

                // Fetch and display results
                if ($result_qualification->num_rows > 0) {
                    $qualifications = [];
                    $qualification_counts = [];
                    while($row = $result_qualification->fetch_assoc()) {
                        $qualifications[] = $row["qualification"];
                        $qualification_counts[] = $row["qualification_count"];
                        $total_count += $row["qualification_count"]; // Accumulate total count
                        echo "<tr><td>" . $row["qualification"] . "</td><td>" . $row["qualification_count"] . "</td></tr>";
                    }
                    $qualifications_json = json_encode($qualifications);
                    $qualification_counts_json = json_encode($qualification_counts);
                } else {
                    echo "<tr><td colspan='2'>No data available</td></tr>";
                }

                // Display total row
                echo "<tr><td><strong>Total</strong></td><td><strong>" . $total_count . "</strong></td></tr>";

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    
    document.getElementById('screenshotButton').addEventListener('click', function() {
    html2canvas(document.querySelector('.container'), {
        scrollX: 0,
        scrollY: 0,
        useCORS: true,
        backgroundColor: null, // Transparent background
        // Ensure it captures only the content within the container
        width: document.querySelector('.container').offsetWidth,
        height: document.querySelector('.container').offsetHeight,
        x: document.querySelector('.container').getBoundingClientRect().left,
        y: document.querySelector('.container').getBoundingClientRect().top
    }).then(canvas => {
        let link = document.createElement('a');
        link.href = canvas.toDataURL("image/png");
        link.download = 'screenshot.png';
        link.click();
    });
});

</script>
<script>
document.getElementById('infoButton').onclick = function() {
    document.getElementById('infoModal').style.display = 'block';
}

document.querySelector('.close').onclick = function() {
    document.getElementById('infoModal').style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == document.getElementById('infoModal')) {
        document.getElementById('infoModal').style.display = 'none';
    }
}
</script>

    <script>
        // JavaScript for modal functionality
        var modal = document.getElementById("infoModal");
        var btn = document.getElementById("infoButton");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // JavaScript for fade-in effect
        window.onload = function() {
            document.querySelector('.container').style.opacity = '1';
        };

        // JavaScript for bar chart (Provinces)
        var ctxProvinces = document.getElementById('myBarChartProvinces').getContext('2d');
        var myBarChartProvinces = new Chart(ctxProvinces, {
            type: 'horizontalBar',
            data: {
                labels: ['Cebu', 'Bohol', 'Siquijor', 'Negros'],
                datasets: [{
                    data: [<?php echo "$num_unique_cebu, $num_unique_bohol, $num_unique_siquijor, $num_unique_negros"; ?>],
                    backgroundColor: ['#3498db', '#2ecc71', '#e74c3c', '#9b59b6']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // JavaScript for bar chart (Sectors)
        var ctxSectors = document.getElementById('myBarChartSectors').getContext('2d');
var myBarChartSectors = new Chart(ctxSectors, {
    type: 'horizontalBar',
    data: {
        labels: <?php echo $sectors_json; ?>,
        datasets: [{
            data: <?php echo $sector_counts_json; ?>,
            backgroundColor: [
    '#3498db', '#2ecc71', '#e74c3c', '#9b59b6', 
    '#f1c40f', '#e67e22', '#1abc9c', '#34495e', 
    '#ff6384', '#36a2eb', '#cc65fe', '#ffce56', 
    '#2c3e50', '#d35400', '#c0392b', '#7f8c8d',
    '#8e44ad', '#27ae60', '#2980b9'
]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

    </script>
</body>
</html>