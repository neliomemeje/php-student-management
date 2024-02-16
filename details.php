<?php 
if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION["Access"]) && $_SESSION["Access"] === "administrator") {
    echo "Welcome ". $_SESSION['Userlogin'];
} else {
    echo header("Location: index.php");
}


include_once("connection/connection.php");
$con = connect();

$userId = $_GET["ID"];

$sql = "SELECT * FROM student_east WHERE id = '$userId'";
$student = $con->query($sql) or die ($con->error);
$row = $student->fetch_assoc();

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
    <h1>Student Details</h1>
    <br>
    <a href="index.php">Back to Home</a><br><br>
    <a href="edit.php?ID=<?php echo $row["id"];?>">Edit</a>
    <br>
    <br>
    <form id="form" action="delete.php" method="post">
       <?php if($_SESSION["Access"] === "administrator") {?> 
         <button onclick="confirmToDelete()" type="submit" name="delete" id="delete">Delete</button> 
        <?php } ?>
    <input type="hidden" name="ID" value="<?php echo $row["id"]; ?>">
    </form>
    <table>
        <thead>
            <tr class="header">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Added_At</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row["first_name"];?></td>
                <td><?php echo $row["last_name"];?></td>
                <td><?php echo $row["birth_day"];?></td>
                <td><?php echo $row["added_at"];?></td>
                <td><?php echo $row["gender"];?></td>
            </tr>
        </tbody>
    </table>
    <script src="index.js"></script>
</body>
</html>