<?php 
include_once("connection/connection.php");
$con = connect();


if(isset($_POST['submit'])) {
$fName = $_POST['firstName'];
$lName = $_POST['lastName'];   
$gender = $_POST['gender'];
$sql = "INSERT INTO `student_east`(`first_name`, `last_name`, `gender`) VALUES ('$fName', '$lName', '$gender')";
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
            <label>First Name</label><br>
            <input type="text" name="firstName"><br>
            <label>Last Name</label><br>
            <input type="text" name="lastName"><br>
            <label>Gender</label><br>
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br>
            <input type="submit" name="submit" value="Submit">
        </form>

</body>
</html>