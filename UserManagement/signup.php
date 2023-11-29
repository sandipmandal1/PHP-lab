<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="signup-form">
    <h2>Signup Form</h2>
    <form action="signup_process.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="fname" required>
      </div>
      <div class="form-group">
        <label for="last-name">Last Name:</label>
        <input type="text" id="last-name" name="lname" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact">
      </div>
      <div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <label for="country">Country:</label>
        <input type="text" id="country" name="country">
      </div>
      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" id="city" name="city">
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age">
      </div>
      <div class="form-group">
        <label for="father-name">Father's Name:</label>
        <input type="text" id="father-name" name="father_name">
      </div>
      <div class="form-group">
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo">
      </div>
      <div class="form-group">
        <input type="submit" value="Signup">
      </div>
    </form>
  </div>
</body>
</html>
