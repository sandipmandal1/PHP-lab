<?php
// Include database connection logic
include 'db_connection.php';

// Check if a user ID is provided for deletion
if (isset($_GET['delete_id'])) {
    $userIdToDelete = $_GET['delete_id'];

    // Delete the selected user from the database
    $stmt = $conn->prepare("DELETE FROM users WHERE user_id= ?");
    $stmt->execute([$userIdToDelete]);

    // Redirect to this same page after deletion (or you can redirect to another page)
    header('Location:UserList.php');
    exit();
}

// Fetch users from the database
$stmt = $conn->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User List</title>
</head>
<body>
  <h1>User List</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= $user['user_id'] ?></td>
          <td><?= $user['first_name'] ?> <?= $user['last_name'] ?></td>
          <td><?= $user['email'] ?></td>
          <td>
            <a href="?delete_id=<?= $user['user_id'] ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
