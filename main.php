<?php
include_once 'DBproject/includs/dbh.inc.php'
?>

<!DOCTYPE html>
<head>

    <title>DB Project1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="hero"> 
        <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle" onclick="login()">Log in</button>
                    <button type="button" class="toggle" onclick="register()">register</button>
                </div>

        <form name="form1" method="post" action="includs/loging.inc.php" id="login" class="input-group">
            <input type="text" class="input-field" placeholder="email" name="email"required>
            <input type="password" class="input-field" placeholder="Passwrod" name="pwd"required>
            <button type="submit" class="submit-btn" name="signin" onclick="emailpassCheck(document.form1.email)">Log in</button>
        </form>

        <form name="form2" id="register" method="post" action="includs/signup.inc.php" class="input-group">
            <input type="text" class="input-field" placeholder="name" name="uid"required>
            <input type="text" class="input-field" placeholder="email" name="email"required>
            <input type="password" class="input-field" placeholder="Passwrod" id="pass1" name="pwd"required>
            <input type="password" class="input-field" placeholder="confirm password" id="pass2" name="pwd-repeat"required>
            <button type="submit" class="submit-btn" name="signup" onclick="emailpassCheck(document.form2.email)">sign up</button>
        </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "+400px";
            z.style.left = "0px";
        }
        function emailpassCheck(inputText){
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var frm = document.getElementById("register") || null;
            var frm1 = document.getElementById("login") || null;
            if(!inputText.value.match(mailformat)){
                alert("invalid email address");
                frm.action = "";
                frm1.action = "";
            }
            else{
                frm.action = "includs/signup.inc.php";
                frm1.action = "includs/loging.inc.php";
            }

        }
        
    </script>
</body>
</html>
