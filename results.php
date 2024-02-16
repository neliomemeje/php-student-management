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

if(isset($_GET["submitName"])) {
  $name = $_GET["name"];
}

$sql = "SELECT * FROM student_east WHERE first_name LIKE '$name%' OR last_name LIKE '$name%' ORDER BY first_name ASC";
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
       <a href="logout.php">Logout</a>
    <?php } else { ?> 
        <a href="login.php">Login</a>
    <?php } ?>
    <br>
    <br>
    <a href="index.php">Back to home</a>
    <br>
    <br>
    <?php if($row) { ?>
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
    <?php } else { ?> 
        <h1>No users match your search.</h1>
    <?php } ?>    
</body>
</html>