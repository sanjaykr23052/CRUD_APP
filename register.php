<?php
include('header.php');
include('dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "Username already exists!";
    } else {
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        if (mysqli_query($connection, $query)) {
            echo "Registration successful!";
            header('Location: login.php'); // Redirect to login page
            exit;
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
}
?>
<form action="register.php" method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<?php include('footer.php'); ?>
