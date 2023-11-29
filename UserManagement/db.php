<?php


$host = 'localhost'; 
$dbname = 'loginsystem';
$username = 'root';
$password = '';


$conn=mysqli_connect($host,$username,$password,$dbname);
if(!$conn)
{
    echo mysqli_connect_error($conn);
}
?>