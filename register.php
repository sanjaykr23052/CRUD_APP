<?php
include('header.php');
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Registration successful. You can <a href='login.php'>login</a> now.";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<form action="register.php" method="post">
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
