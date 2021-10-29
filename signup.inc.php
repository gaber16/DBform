<?php


$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "registration";


$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if (!$conn){
    die("connection failed: ");
}
else {
    echo "connected successfully";
}

    $name = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordConf = $_POST['pwd-repeat'];


    if($passwordConf !== $password){
        header("Location: ../main.php?error=passwordsAreNotSame&uid=");
        echo "password config arrived";
       exit();
    }
    else{
        $sql = "SELECT email FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //header("Location: ../main.php?weIN");
            
            while($row = $result->fetch_assoc()){
                //header("Location: ../test.php?while");
                if ($row['email'] == $email) {
                    header("Location: ../main.php?error=emailTaken");
                    exit();
                }
                else {
                    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $name, $email, $password);

                    //$hashedpwd = md5($password, true);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../test.php?signup=success");
                    exit();
                }
            }

        
       }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


