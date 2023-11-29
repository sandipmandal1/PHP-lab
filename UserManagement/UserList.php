<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Portfolio</title>
  <link rel="stylesheet" href="css/userlist.css">
</head>
<body>
  <h1>User Portfolio</h1>
  <div class="portfolio">
    <?php
    // Include database connection logic
    include 'db_connection.php';

    // Fetch users from the database
    $stmt = $conn->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user): ?>
      <div class="user-card">
      <img src="data:image/jpeg;base64,<?= base64_encode($user['photo_data']) ?>" alt="User Photo">
        
        <h3><?= $user['first_name'] ?> <?= $user['last_name'] ?></h3>
        <p><strong>Email:</strong> <?= $user['email'] ?></p>
        <p><strong>Contact:</strong> <?= $user['contact'] ?></p>
        <p><strong>Country:</strong> <?= $user['country'] ?></p>
        <p><strong>Gender:</strong> <?= $user['gender'] ?></p>
        <p><strong>City:</strong> <?= $user['city'] ?></p>
        <p><strong>Age:</strong> <?= $user['age'] ?></p>
        <p><strong>Father Name:</strong> <?= $user['father_name'] ?></p>
        <p><strong>Password:</strong> <?= $user['password'] ?></p>
        <p><strong>Role:</strong><?=$user['role']?></p>


        <!-- Add more details as needed -->
      </div>
    <?php endforeach; ?>
  </div>
</body>
</html>
