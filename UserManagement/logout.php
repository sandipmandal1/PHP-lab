<?php
session_start();
echo '<script>alert("Login successful. Welcome to the dashboard!");</script>';
header("location:login.php");
sleep(1);
session_destroy();


?>