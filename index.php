<?php 
if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION["Userlogin"])) {
    echo "Welcome ". $_SESSION['Userlogin'];
} else {
    echo "Welcome Guest";
}

include_once("connection/connection.php");
$con = connect();

$sql = "select * from student_east ORDER BY id DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

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
    <h1 class="header">Student Management System</h1>
    <br>
    <?php if(isset($_SESSION["Userlogin"])) { ?>
       <a class="login-logout" href="logout.php">Logout</a>
    <?php } else { ?> 
       <a class="login-logout" href="login.php">Login</a>
    <?php } ?>
    <button><a href="admin.php">Add users as admin to view files.</a></button><br>
    <br>
    <form action="results.php" method="get">
        <input type="text" name="name">
        <button type="submit" name="submitName">Search</button>
    </form>
    <a href="addItem.php">Add New</a>
    <br>
    <br>
    <table>
       <thead>
            <tr class="header">
                <th></th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
       <tbody>
      <?php do{ ?>
            <tr>
                <td><a href="details.php?ID=<?php echo $row["id"];?>">view</a></td>
                <td><?php echo $row["first_name"]; ?></td>
                <td><?php echo $row["last_name"]; ?></td>
            </tr>
        <?php } while($row = $students->fetch_assoc())?>
        </tbody>
    </table>
</body>
</html>