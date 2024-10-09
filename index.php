<?php
session_start(); // Start the session

// Include the database connection
include 'db_connection.php';

$errorMessage = ""; // Initialize error message variable

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword, $role); // Bind both password and role
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct; log the user in
            $_SESSION['username'] = $username; // Store username in session
            $_SESSION['role'] = $role; // Store role in session

            // Check the user role and redirect accordingly
            if ($role === 'admin') {
                header("Location: admindash.php"); // Redirect to admin dashboard
            } else {
                header("Location: dashboard.php"); // Redirect to user dashboard
            }
            exit();
        } else {
            // Password is incorrect
            $errorMessage = "Invalid username or password.";
        }
    } else {
        // Username does not exist
        $errorMessage = "User not found."; // Set error message for user not found
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
    <style>
        /* Basic styles for the modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 50%; /* Center horizontally */
            top: 50%; /* Center vertically */
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.7); /* Black w/ opacity */
            backdrop-filter: blur(10px); /* Increased blur for glass effect */
            animation: fadeIn 0.5s; /* Animation for modal appearance */
            transform: translate(-50%, -50%); /* Adjust position to truly center */
        }

        /* Modal content */
        .modal-content {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.3));
            margin: 5% auto; /* Reduced margin for smaller modal */
            padding: 15px; /* Reduced padding */
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            width: 90%; /* Smaller width for the modal */
            max-width: 350px; /* Further reduced max width for the modal */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            transform: scale(0); /* Initial scale for pop-out animation */
            animation: popOut 0.5s forwards; /* Pop-out animation */
        }

        /* Close button */
        .close {
            color: #fff; /* White for visibility on dark background */
            float: right;
            font-size: 24px; /* Slightly smaller close button */
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #00f; /* Blue hover effect */
            text-decoration: none;
            cursor: pointer;
        }

        /* Animation keyframes */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes popOut {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="icons/tlogo.png" alt="Logo" class="logo"> <!-- Add your logo here -->
            <h2>TESDA Region VII Dashboard</h2>
        </div>
        <h2>Login</h2>
        <form id="loginForm" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <input type="checkbox" id="showPassword"> Show Password
            </div>
            <button type="submit">Login</button>
            <div class="links">
                <a href="reset.php">Forgot Password?</a>
                <a href="accform.php">Create Account</a>
            </div>
        </form>
    </div>

    <!-- Modal for error message -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <p id="errorMessage"><?php echo htmlspecialchars($errorMessage); ?></p> <!-- Display the error message -->
        </div>
    </div>

    <script>
        // JavaScript for Show Password functionality
        document.getElementById('showPassword').addEventListener('change', function() {
            const passwordInput = document.getElementById('password');
            // Toggle the type of the password input based on the checkbox state
            passwordInput.type = this.checked ? 'text' : 'password';
        });

        // Show the modal if there's an error message
        const errorMessage = "<?php echo addslashes($errorMessage); ?>"; // Escape quotes for JavaScript
        if (errorMessage) {
            document.getElementById('errorModal').style.display = 'block';
        }

        // Close the modal when the close button is clicked
        document.getElementById('closeModal').onclick = function() {
            document.getElementById('errorModal').style.display = 'none';
        }

        // Close the modal when clicking outside of the modal content
        window.onclick = function(event) {
            if (event.target == document.getElementById('errorModal')) {
                document.getElementById('errorModal').style.display = 'none';
            }
        }
    </script>
</body>
</html>
