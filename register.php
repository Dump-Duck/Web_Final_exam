<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="CSS/register&login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    <div id="notification-area">
    </div>
    <form class="register-form" method="post" action="">
        <p class="form-title">Register your new account!</p>
        <p>Username: </p><input id="username" autocomplete="off" type="text" name="username" placeholder="Username"><br>
        <p>Password: </p><input id="password" type="password" name="password" placeholder="Password"><br>
        <p>Re-password: </p><input id="re-password" type="password" name="repassword" placeholder="Re-password"><br>
        <p>Account Type: <select id="select-type" name="type">
            <?php 
                require 'connect.php';
                $account_type = "select * from account_types where id!=1";
                $result = $conn->query($account_type);
                if($result->num_rows>0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['id']."'>".$row['type']."</option>";
                    }
                }
                $conn->close();
            ?>
        </select></p>
        <p id="already">Already have account? <a href='login.php'>Login!</a></p><br>
        <input id="submit" type="submit" name="register" value="Register!"><br>
        <?php 
            require 'connect.php';
            if(isset($_POST['register'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password2 = $_POST['repassword'];
                $type = $_POST['type'];
                if($username=="") {
                    echo "";
                } else {
                    $create_new_account = "insert into users(user_name, password, account_type) values('$username','$password','$type')";
                    $check_user = "select * from users where user_name='$username'";
                    $result = $conn->query($check_user);
                    if($result->num_rows>0) {
                        while($user = $result->fetch_assoc()) {
                            if($user['user_name']==$username) {
                                //account has already been created
                                echo "<script>alert('Your username has already exists. Please try again!');</script>";
                            }
                        }
                    }
                    else {
                        if($password2==$password) {
                            if($conn->query($create_new_account)==TRUE) {
                                echo "<script>alert('Your account has been created. Click OK to confirm and you will be redirected to login page in few second!');</script>";
                                header('refresh:3;url=login.php');
                            }
                        }   
                    } 
                }
                $conn->close();
            }
        ?>
    </form><br>
</body>
<script src="Javascript/register&login_check.js"></script>
</html>