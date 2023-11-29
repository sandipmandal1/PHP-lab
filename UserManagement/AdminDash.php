


<!-- Admin Dashboard HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <div>
        <!-- Buttons for Admin Actions -->
        <button onclick="checkNumberOfUsers()">Check Number of Users</button>
        <button onclick="editUser()">Edit User</button>
        <button onclick="addUser()">Add User</button>
        <button onclick="removeUser()">Remove User</button>
        <button onclick="logout()">LogOut</button>

        <button onclick="checkMyDetails()">My Details</button

    </div>

    <script>
        // JavaScript functions to handle button actions (You can use AJAX for actual actions)

        function checkMyDetails(){
            window.location.href='ViewDetails.php';
        }
        function checkNumberOfUsers() {
            // Redirect or perform action to check number of users
            window.location.href = 'UserList.php';
        }

        function editUser() {
            // Redirect or perform action to edit user
            window.location.href = 'edit.php';
        }

        function addUser() {
            // Redirect or perform action to add user
            window.location.href = 'add_user.php';
        }

        function removeUser() {
            // Redirect or perform action to remove user
            window.location.href = 'delet.php';
        }
        function logout()
        {
            window.location.href='logout.php';
        }
    </script>
</body>
</html>
