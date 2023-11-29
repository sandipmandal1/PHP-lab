<?php
// Include database connection logic
include 'db_connection.php';

// Fetch users from the database
$stmt = $conn->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if a user ID is provided for updating details
if (isset($_GET['edit_id'])) {
    $userIdToEdit = $_GET['edit_id'];

    // Fetch user details based on the selected ID
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$userIdToEdit]);
    $selectedUser = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Management</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="signup-form">
  <h1>User Management</h1>
  
  <!-- List of users -->
  <h2>User List</h2>
  <ul>
    <?php foreach ($users as $user): ?>
      <li>
        <?= $user['user_id'] ?>: <?= $user['first_name'] ?> <?= $user['last_name'] ?>
        <a href="?edit_id=<?= $user['user_id'] ?>">Edit</a>
      </li>
    <?php endforeach; ?>
  </ul>
  
  <!-- Form to update user details -->
  <?php if (isset($selectedUser)): ?>
    <h2>Edit User Details</h2>
    <form action="update.php" method="post" enctype="multipart/form-data">
      
      <input type="hidden" name="user_id" value="<?= $selectedUser['user_id'] ?>">
      <div class="form-group">
        <label for="father_name">Father's Name:</label>
        <input type="text" id="father_name" name="father_name" value="<?= $selectedUser['father_name'] ?>">
      </div>
      <div class="form-group">
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="<?= $selectedUser['contact'] ?>">
      </div>
      <div class="form-group">
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo">
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?= $selectedUser['age'] ?>">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $selectedUser['email'] ?>">
      </div>
      <div class="form-group">
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?= $selectedUser['country'] ?>">
      </div>
      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?= $selectedUser['city'] ?>">
      </div>
      <div class="form-group"> 
        <label for="role"> Role:</label>
        <select name="role" id="Role" value="role">
        <option value="role"><?=$selectedUser['role']?></option>
       <option value="">student</option>
      <option value="admin">admin</option>
    </select>
      </div>

      <div class="form-group">
        <input type="submit" value="Update">
      </div>
    </form>
  <?php endif; ?>
  </div>
</body>
</html>
