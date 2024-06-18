<?php
include('header.php');
include('dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) { // Verify the password
            $_SESSION['username'] = $username;
            header('Location: index.php'); // Redirect to a protected page
            exit;
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that username!";
    }
}
?>
<form action="login.php" method="POST">
<div class="form-group">

    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
</div>
<div class="form-group">

    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
</div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

<?php include('footer.php'); ?>
