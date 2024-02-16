<?php 
if(!isset($_SESSION)) {
    session_start();
}

include_once("connection/connection.php");
$con = connect();

if(isset($_POST["login"])) {
    $user = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM student_users WHERE username = '$user' AND password = '$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0) {
        $_SESSION["Userlogin"] = $row["username"];
        $_SESSION["Access"] = $row["access"];
        echo header("Location: index.php");
    } else {
        echo "No such user.";
    }

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
            <h1>Login</h1>
            <label>Username</label><br>
            <input type="text" name="username"><br>
            <label>Password</label><br>
            <input type="password" name="password"><br>
            <input type="submit" name="login" value="Login">
        </form>
</body>
</html>