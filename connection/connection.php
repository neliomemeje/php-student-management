<?php 
function connect() {
$host = "localhost";
$username = "root";
$password = "keanmiguel4";
$database = "student_db";
$con = new mysqli($host,$username,$password,$database);

if($con->connect_error) {
    echo $con->connect_error;
} else {
    return $con;
}

}

?>