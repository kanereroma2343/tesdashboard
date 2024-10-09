<?php
session_start();
include 'db_connection.php'; // Include your database connection file

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: a_dashboard.php'); // Redirect to login if not logged in
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adminPassword'])) {
    $adminPassword = $_POST['adminPassword'];
    // Replace with your own admin password check
    if ($adminPassword == 'yourAdminPassword') { // Change to your actual admin password
        $userId = $_POST['userId'];
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('User deleted successfully.');</script>";
    } else {
        echo "<script>alert('Invalid admin password.');</script>";
    }
}

// Fetch users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="userTable">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['username']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['password']) ?></td>
                        <td><?= htmlspecialchars($row['role']) ?></td>
                        <td>
                            <button onclick="openModal(<?= $row['id'] ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div id="deleteUserModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Delete User</h2>
                <form id="deleteForm" method="POST">
                    <input type="password" name="adminPassword" placeholder="Enter Admin Password" required>
                    <input type="hidden" name="userId" id="userId">
                    <button type="submit">Delete User</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>

<?php $conn->close(); ?>
