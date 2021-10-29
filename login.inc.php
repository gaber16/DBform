<?php


$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "registration";


$email = $_POST['email'];
$password = $_POST['pwd'];

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if (!$conn){
    die("connection failed: ");
}
else {
    echo "connected successfully";
}

$sql = "SELECT email, password FROM users";

$result = $conn->query($sql);

//print_r($row['password']); 
if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
                if ($row['email'] == $email and $row['password'] == $password ) {
                    
                    header("Location: ../test.php?login=Success");
                    exit();
                }
                else {
                    header("Location: ../main.php?error=NoUser");
                    exit(); 
                }
        }
        
}
        mysqli_close($conn); 

