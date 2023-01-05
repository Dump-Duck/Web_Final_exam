<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Tìm phim</title>
    <link rel="stylesheet" type="text/css" href="search.css">
</head>

<body>
    <ul>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<li>Hello " . $_SESSION['username'] . "</li>";
            echo "<li><a href='../logout.php'>Logout</a></li>";
            echo "<li><a href='create.php'>Add</a></li>";
        } else {
            echo "<li><a href='../login.php'>Login</a></li>";
        }

        ?>
        <li><a href='movie_page.php'>Home</a></li>
        <li><a href="search.php">Search</a></li>
    </ul>
    <h1></h1>
    <form method="get" action="" name="register">
        Tên phim <input type="text" name="name" /><br>
        <input type="submit" value="Search" /><br>
    </form>
    <?php
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        // connect to the database
        require 'connect.php';
        mysqli_set_charset($conn, 'UTF8'); // sửa lỗi tiếng việt
        // // Create sql to select data
        $sql = "SELECT * FROM movie WHERE name = '$name'";
        // run the query and store result to a variable
        $result = $conn->query($sql);
        // process received data
        require('display.php');
        // close the connection
        $conn->close();
    }
    ?>
</body>

</html>