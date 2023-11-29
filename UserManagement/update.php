<?php
// Include database connection logic
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_id'])) {
        $userId = $_POST['user_id'];

        // Fetch user details based on the provided user ID
        /*
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        */
       // Replace this with the desired user ID

            // SQL query with the user_id as a parameter
        $sql = "SELECT * FROM users WHERE user_id = ?";

            // Prepare the SQL query
        $stmt = mysqli_prepare($conn, $sql);

            // Bind the user_id parameter
        mysqli_stmt_bind_param($stmt, "i", $userId); // Assuming user_id is an integer

            // Execute the prepared statement
        mysqli_stmt_execute($stmt);

            // Get the result
        $result = mysqli_stmt_get_result($stmt);

            // Fetch the user data as an associative array
        $user = mysqli_fetch_assoc($result);




        if ($user) {
            // Update user details
            $fatherName = $_POST['father_name'];
            $contact = $_POST['contact'];
            // Handle file upload for photo if needed
            // $photo = $_FILES['photo']['name'];
            $photo = $_FILES['photo']['tmp_name'];
            $pic = file_get_contents($photo);
            //$Fphoto = $conn->real_escape_string($portfolioImageContent);


            $age = $_POST['age'];
            $email = $_POST['email'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $role=$_POST['role'];

            $stmt = $conn->prepare("UPDATE users SET father_name = ?, contact = ?, age = ?, email = ?,role=?, country = ?,photo_data=?, city = ? WHERE user_id = ?");
            $stmt->execute([$fatherName, $contact, $age, $email,$role, $country,$pic, $city, $userId]);

            // Redirect to the admin panel or user list page after updating
            echo "Updated";
            header("Location:AdminDash.php");
            exit();
        } else {
            echo "User not found!";
        }
    } else {
        echo "User ID not provided!";
    }
}
?>
