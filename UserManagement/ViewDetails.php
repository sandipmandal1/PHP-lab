<html>
    <head>
        <title>portfolio</title>
        <link rel="stylesheet" href="css/design.css">
    </head>
    <body>
        <div class="portfolio-container">
        <?php
        include'db.php';
        session_start();

      
            $email = $_SESSION['email'];
            $password =$_SESSION['password'];

          

            $query = "SELECT * FROM users WHERE email = ? AND password = ?";
            $stmt = $conn->prepare($query);
            
            if ($stmt) {
                $stmt->bind_param("ss", $email, $password);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    // Display user details fetched from the database
                    echo '<div class="portfolio-entry">';
                    echo '<h2>' . 'Name: ' . '</h2>';
                    echo '<h2>' . $row['first_name'] . " " . $row['last_name'] . '</h2>';
                    echo '<p>Email: ' . $row['email'] . '</p>';
                    echo '<p>Phone: ' . $row['contact'] . '</p>';
                    echo '<p>Gender: ' . $row['gender'] . '</p>';
                    echo '<p>Age: ' . $row['age'] . '</p>';
                    echo'<p>Country:'.$row['country'].'</p>';
                    echo'<p>City:'.$row['city'].'</p>';
                    echo'<p>Role:'.$row['role'].'</p>';
                    echo'<p>Father Name:'.$row['father_name'].'</p>';
                    $imageData = base64_encode($row['photo_data']);
                    echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="User Photo">';
                
                    echo '</div>';
                    die(); 
                } 
           
            $stmt->close(); // Close the prepared statement
            }
        // Close the database connection when done
        $conn->close();
        ?>
        </div>
    </body>
    </html>
    
