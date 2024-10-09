<?php
// Include the database connection
include 'db_connection.php'; // Assuming you have the db_connection.php file from earlier

$successMessage = ""; // Initialize variable for success message
$selectedRole = "focal"; // Default role

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $selectedRole = isset($_POST['role']) && $_POST['role'] === 'admin' ? 'admin' : 'focal'; // Get the selected role

    // Validate passwords
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $selectedRole);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        $successMessage = "Account created successfully. You can now <a href='login.php'>login</a>.";
    } else {
        echo "Error: " . $stmt->error;
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
    <title>Create Account</title>
    <link rel="stylesheet" href="login.css"> <!-- Link to your existing CSS -->
    <style>
        /* Modal styles */
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

        /* Additional styling */
        body {
            font-family: Arial, sans-serif; /* Set a default font */
            background-color: #2b2b2b; /* Dark background for the page */
            color: #fff; /* White text for readability */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height for centering */
            margin: 0; /* Remove default margin */
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1); /* Light background for the form */
            padding: 15px; /* Reduced padding */
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 100%; /* Responsive width */
            max-width: 450px; /* Smaller max width for the form */
        }

        h2 {
            text-align: center;
            margin-bottom: 15px; /* Reduced space between heading and form */
        }

        .form-group {
            margin-bottom: 10px; /* Reduced space between form groups */
        }

        .form-group label {
            display: block; /* Label on a new line */
            margin-bottom: 5px; /* Space below the label */
        }

        .form-group input {
            width: 100%; /* Full width for input */
            padding: 8px; /* Reduced padding */
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .role-slider {
            display: flex;
            align-items: center;
            margin-bottom: 15px; /* Reduced space below the role slider */
        }

        .toggle-label {
            display: inline-block;
            margin: 0 5px; /* Reduced space around toggle label */
            color: #fff; /* White text for readability */
        }

        .toggle-switch {
            position: relative;
            width: 40px; /* Smaller switch */
            height: 20px; /* Smaller height */
            background: #ccc; /* Default background */
            border-radius: 15px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .toggle-switch input {
            opacity: 0; /* Hide default checkbox */
            width: 0;
            height: 0;
        }

        .toggle-circle {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px; /* Smaller circle */
            width: 20px; /* Smaller width */
            background: white; /* Circle color */
            border-radius: 50%;
            transition: transform 0.3s; /* Smooth transition */
        }

        .toggle-switch input:checked + .toggle-circle {
            transform: translateX(20px); /* Move the circle for Admin */
        }

        .toggle-switch input:checked {
            background: #66bb6a; /* Green for Admin */
        }

        button {
            width: 100%; /* Full width for button */
            padding: 8px; /* Reduced padding */
            background: #007bff; /* Button color */
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 14px; /* Smaller font size */
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #0056b3; /* Darker button on hover */
        }

        .links {
            text-align: center; /* Center the links */
            margin-top: 10px; /* Reduced space above links */
        }

        .links a {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline */
        }

        .links a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="icons/tlogo.png" alt="Logo" class="logo"> <!-- Add your logo here -->
        </div>
        <h2>Create Account</h2>
        <form id="createAccountForm" method="POST" action=""> <!-- Ensure the form submits data to the same page -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required> <!-- Corrected input type to "email" -->
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="checkbox" id="showPassword"> Show Password
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>

            <!-- Role selection slider -->
            <div class="role-slider">
                <label for="role" class="toggle-label">Focal</label>
                <div class="toggle-switch">
                    <input type="checkbox" id="role" name="role" value="admin">
                    <span class="toggle-circle"></span>
                </div>
                <label for="role" class="toggle-label">Admin</label>
            </div>

            <button type="submit">Create Account</button>
            <div class="links">
                <a href="index.php">Already have an account? Log in</a>
            </div>
        </form>
    </div>

    <!-- Modal for success message -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <p><?php echo $successMessage; ?></p> <!-- Display the success message -->
        </div>
    </div>

    <script>
        // Show the modal if there's a success message
        const successMessage = "<?php echo $successMessage; ?>";
        if (successMessage) {
            document.getElementById('successModal').style.display = 'block';
        }

        // Close the modal when the close button is clicked
        document.getElementById('closeModal').onclick = function() {
            document.getElementById('successModal').style.display = 'none';
        }

        // Close the modal when clicking outside of the modal content
        window.onclick = function(event) {
            if (event.target == document.getElementById('successModal')) {
                document.getElementById('successModal').style.display = 'none';
            }
        }

        // Show/hide password functionality
        document.getElementById('showPassword').addEventListener('change', function() {
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const type = this.checked ? 'text' : 'password';
            passwordInput.type = type;
            confirmPasswordInput.type = type;
        });
    </script>
</body>
</html>
