
<html>
    <head>
        <title>portfolio</title>
        <link rel="stylesheet" href="css/design.css">
    </head>
    <body>
        <div class="portfolio-container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "loginsystem";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

           $_SESSION['email']=$email;
           $_SESSION['password']=$password;
           

            $query = "SELECT * FROM users WHERE email = ? AND password = ?";
            $stmt = $conn->prepare($query);
            
            if ($stmt) {
                $stmt->bind_param("ss", $email, $password);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<script>alert("Login successful. Welcome to the dashboard!");</script>';
                    if($row['role']==='student'){
                     header("location:StudentDash.php");
                    }else{
                        header("location:AdminDash.php");
                    }
                }
            

                  
                    
                   // echo '<script>alert("Login successful. Welcome to the dashboard!");</script>';
                else {
                    // User does not exist or invalid credentials
                    echo '<script>alert("Register First. You are being redirected to SignUp page!");</script>';
                    echo "<script>setTimeout(\"location.href = 'signup.php';\", 1500);</script>";
                    die(); 
                }
            } else {
                // Error in prepared statement
                echo "Error in prepared statement.";
            }
            
            $stmt->close(); // Close the prepared statement
        }

        // Close the database connection when done
        $conn->close();
        ?>
        </div>
    </body>
    </html>
    
