<?php
include('dbcon.php');

if(isset($_POST['add_students'])){
    $_name = $_POST['name'];
    $_description = $_POST['description'];
    $_password = $_POST['password'];

    // Input validation
    if($_name == "" || empty($_name)){
        header('location:index.php?message=You need to fill the name!');
        exit(); // Ensure no further code is executed
    }

    // Hash the password before storing
    $_hashed_password = password_hash($_password, PASSWORD_BCRYPT);

    // Prepare the SQL query with proper syntax
    $query = "INSERT INTO `students` (`name`, `description`, `password`) VALUES ('$_name', '$_description', '$_password')";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?insert_msg=Your data has been added successfully');
    }
}
?>
