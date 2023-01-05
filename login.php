<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/register&login.css">
</head>
<body>
    <div id="notification-area"></div>
    <form class="login-form" method="post" action="">
        <p class='form-title'>Login to your account: </p>
        <p>Username: </p><input type="text" autocomplete="off" id="username" name="username" placeholder="Username">
        <span id="err"><?php 
            require 'connect.php';
            if(isset($_POST['login'])){
                if($_POST['username'] == "") { echo "*Please enter a username! <a href='javascript: history.go(-1)'>Trở lại</a>"; exit; }
                else{
                    $check_username = $_POST['username'];
                    $get_username = "select * from users where user_name = '$check_username'";
                    $result_username = $conn->query($get_username);
                    if($result_username->num_rows == 0){
                        echo "*Username not found! <a href='javascript: history.go(-1)'>Trở lại</a>";
                        exit;
                    }
                }
            }
        ?></span><br><br>
        <p>Password: </p><input type="password" id="password" name="password" placeholder="Password">
        <span id="err"><?php 
            require 'connect.php';
            if(isset($_POST['login'])){
                if($_POST['password'] == "") { echo "*Please enter a password! <a href='javascript: history.go(-1)'>Go back</a>"; exit; }
                else{
                    $check_password = $_POST['password'];
                    $row = $result_username->fetch_assoc();
                    if($row==FALSE){echo "";}
                    else{
                        if($check_password != $row['password']){
                            echo "*Password is incorrect! <a href='javascript: history.go(-1)'>Go back</a>";
                            exit;
                        }
                    }
                }
            }
        ?></span><br><br>
        <p id="register-redirect">New member? Click <a href='register.php'>here</a> to register.</p>
        <input type="submit" id="submit" style="margin: 10px 225px" name="login" value="Login">
    </form><br>
    <?php
        require 'connect.php';
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $login = "select user_name, password from users where user_name='$username'";
            $result_login = $conn->query($login);
            $row = $result_login->fetch_assoc();
            if($result_login==TRUE and $row['password']==$password){
                session_start();
                $_SESSION['username'] = $username;
                header('location: manga_page.php');
                echo "You have successfully Login click <a href='manga_page.php'>here</a> to return to home page.";
            } else { exit; }
        }
    ?>
</body>
<script src="Javascript/register&login_check.js"></script>
</html>