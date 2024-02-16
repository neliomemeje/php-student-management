<?php 
include_once("connection/connection.php");
$con = connect();
if(isset($_POST["delete"])) {
    $userId = $_POST["ID"];
    $sql = "DELETE FROM student_east WHERE id = '$userId'";
    $con->query($sql) or die($con->error);
    echo header("Location: index.php");
} 
?>