<?php include('header.php'); ?>
<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "<h4>Hello " . $_SESSION['username'] . "</h4>";

//     header('Location: login.php');
//     exit;
 }

  else {
    header('Location: login.php');
    exit;
}
?>
<a href="logout.php" class="btn btn-danger">Logout</a>
<?php include('footer.php'); ?>