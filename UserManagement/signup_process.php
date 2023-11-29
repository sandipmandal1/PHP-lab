<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "loginsystem";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$city = $_POST['city'];
$age = $_POST['age'];
$father_name = $_POST['father_name'];
$user_password = $_POST['password']; 

$photo = $_FILES['photo']['tmp_name'];
$pic = file_get_contents($photo);
$Fphoto = $conn->real_escape_string($pic);

$sql = "INSERT INTO users (first_name, last_name, email, password, contact, gender, country, city, age, father_name, photo_data)
        VALUES ('$name', '$lname', '$email', '$user_password', '$contact', '$gender', '$country', '$city', '$age', '$father_name', '$Fphoto')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully!";
    header("location:login.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
