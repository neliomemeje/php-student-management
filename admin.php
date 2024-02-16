<?php 
include_once("connection/connection.php");
$con = connect();


if(isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];   

$sql = "INSERT INTO `student_users`(`username`, `password`) VALUES ('$username', '$password')";
$con->query($sql) or die ($con->error);
echo header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <form action="" method="post">
        <label>Username</label><br>
        <input type="text" name="username"><br>
        <label>Password</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>