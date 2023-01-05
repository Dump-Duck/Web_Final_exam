<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
</head>
<body>
    <h1>Change password</h1>
    <form method='post'>
        <p>New password: </p><input type='text' name='password' placeholder='Enter your new password'>
        <p>Re-type new password: </p><input type='text' name='password2' placeholder='Re-type your new password'><br><br>
        <input type='submit' name='re-password' value='change'>
    </form><hr>
    <button><a href='manga_page.php'>Home</a></button>
    <?php
        if(isset($_POST['re-password'])) {
            require 'connect.php';
            session_start();
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $username = $_SESSION['username'];
            if($password2!=$password){
                echo "Your password and re-password not match! <a href='javascript: history.go(-1)'>Try again</a>.";
                exit;
            } elseif($password=='' or $password2=='') {
                echo "No field in the form can be left blank! <a href='javascript: history.go(-1)'>Try again</a>.";
            } 
            else {
                $sql = "update users set password='$password' where user_name='$username'";
                if($conn->query($sql)==TRUE){
                    echo "Password has been changed!";
                } else { echo "Error"; }
            }
        }
    ?>
</body>
</html>