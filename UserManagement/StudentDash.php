<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/student.css">
</head>
<body>
    <h1>Welcome, Student!</h1>
    <div class="container">
        <!-- Buttons for Student Actions -->
        <button onclick="viewDetails()">View Details</button>
        <button onclick="checkStatus()">Check Status</button>
        <button onclick="logout()">Logout</button>
    </div>

    <script>
        alert("Login successful. Welcome to the dashboard!");

        function viewDetails() {
            // Redirect or perform action to view student details
            window.location.href = 'ViewDetails.php';
        }

        function checkStatus() {
            // Redirect or perform action to check status
            window.location.href = 'check_status.php';
        }

        function logout() {
            // Redirect or perform action to logout
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>
