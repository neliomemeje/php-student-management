<?php 
include_once("connection/connection.php");
$con = connect();

$userId = $_GET["ID"];
$sql = "SELECT * FROM student_east WHERE id = '$userId'";
$student = $con->query($sql) or die ($con->error);
$row = $student->fetch_assoc();

if(isset($_POST['submit'])) {
$fName = $_POST['firstName'];
$lName = $_POST['lastName'];   
$bDay = $_POST['birthdate'];  
$gender = $_POST['gender'];
$sql2 = "UPDATE student_east SET first_name='$fName',last_name='$lName',birth_day='$bDay', gender='$gender' WHERE id ='$userId'";
$con->query($sql2) or die ($con->error);
echo header("Location: details.php?ID=".$userId);
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
    <h1>Edit Entry</h1>
    <form action="" method="post">
        <label>First Name</label><br>
        <input type="text" name="firstName" value="<?php echo $row['first_name'];?>"><br>
        <label>Last Name</label><br>
        <input type="text" name="lastName" value="<?php echo $row['last_name'];?>"><br>
         <label>Birthday</label><br>
        <input type="date" name="birthdate" value="<?php echo $row['birth_day'];?>"><br>
        <label>Gender</label><br>
        <select name="gender">
            <option value="Male" <?php echo ($row['gender'] === "Male") ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?php echo ($row['gender'] === "Female") ? 'selected' : '' ?>>Female</option>
        </select><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>