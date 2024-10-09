<?php
session_start();
include 'db_connection.php'; // Include your database connection

// Check if the user is logged in as admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login page if not logged in as admin
    exit();
}

// Initialize message variable
$message = '';

// Delete user logic
if (isset($_POST['delete_user'])) {
    $userId = $_POST['user_id'];
    $deleteSql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    if ($stmt) {
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $message = "User deleted successfully.";
        } else {
            $message = "Error deleting user.";
        }
        $stmt->close();
    } else {
        $message = "Error preparing statement.";
    }

    // Redirect to prevent form resubmission
    header("Location: a_dashboard.php");
    exit();
}

// Fetch all users
$sql = "SELECT id, username, role FROM users";
$result = $conn->query($sql);

// Handle query error
if (!$result) {
    die("Error fetching users: " . $conn->error);
}

// Count total users
$totalUsers = $result->num_rows;

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css"> <!-- Link to your CSS file -->
    <style>
        /* Basic styles for the dashboard */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .user-table {
    width: 50%;
    border-collapse: collapse;
    margin: 20px auto; /* This centers the table horizontally */
}

        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .user-table th {
            background-color: #007BFF;
            color: white;
        }
        .button {
            background-color: #f44336; /* Red */
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
        }
        .welcome-message {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p class="welcome-message">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <p>Total Users: <?php echo $totalUsers; ?></p>
    
    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <table class="user-table">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php if ($totalUsers > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['role']); ?></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <button type="submit" name="delete_user" class="button">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No users found.</td>
            </tr>
        <?php endif; ?>
    </table>

    <br>
    <a href="index.php" class="button">Logout</a>
</body>
</html>
