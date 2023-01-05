<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        div {
            display: inline-block;
            padding: 5px 0px;
            align-items: center;
        }

        b {
            display: block;
            text-align: center;
        }

        p {
            display: block;
            text-align: center;
            margin: 1vh 0vh;
            font-size: 14px;
            color: #acacac;
        }

        h1 {
            text-align: center;
        }

        h2 {
            text-align: right;
            margin-right: 25px;
        }

        a {
            color: white;
            text-decoration: none;
        }

        body {
            background-color: #231b2e;
            color: white;
            font-family: sans-serif;
            margin: 0;
        }

        .musiclist {
            margin-top: 90px;
            width: 100%;
        }

        .song {
            padding: 5px 10px;
        }

        a:hover {
            color: #7558ac;
        }
    </style>
    <link href="CSS/Menu.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Music List</title>
</head>

<body>
    <nav class="nav">
        <div class="nav-menu">
            <div class="icon">
                <a href="#" class="name-group">MKD Team</a>
            </div>
            <div>
                <ul class="menu-items">
                    <?php
                    session_start();
                    require 'connect.php';
                    if (isset($_SESSION['username'])) {
                        echo "<li class='menu-link'><a class='menu-option'>" . $_SESSION['username'] . "</a></li>";
                    }
                    ?>
                    <li class="menu-link"><a href="music_page.php" class="menu-option">Nghe nhạc</a></li>
                    <li class="menu-link"><a href="../Movie/movie_page.php" class="menu-option">Xem phim</a></li>
                    <li class="menu-link"><a href="../manga_page.php" class="menu-option">Đọc truyện</a></li>
                    <li class="menu-link"><a href="search.php" class="menu-option">Tìm kiếm</a></li>
                    <?php
                    require 'connect.php';
                    if (isset($_SESSION['username'])) {
                        $check_account = "SELECT * FROM users WHERE user_name = '" . $_SESSION['username'] . "'";
                        $check_account_type = $conn->query($check_account);
                        if ($check_account_type->num_rows > 0) {
                            while ($row = $check_account_type->fetch_assoc()) {
                                if ($row['account_type'] == 1 or $row['account_type'] == 3) {
                                    echo "<li class='menu-link'><a href='song_manage.php' class='menu-option'>Quản lý nhạc</a></li>";
                                    echo "<li class='menu-link'><a href='../logout.php' class='menu-option'>Đăng xuất</a></li>";
                                } else {
                                    echo "<li class='menu-link'><a href='../logout.php' class='menu-option'>Đăng xuất</a></li>";
                                }
                            }
                        }
                    } else {
                        echo "<li class='menu-link'><a href='../login.php' class='menu-option'>Đăng nhập</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="social">
                <a href="#" class="fa fa-facebook icon-social"></a>
                <a href="#" class="fa fa-youtube icon-social"></a>
                <a href="#" class="fa fa-github icon-social"></a>
            </div>
        </div>
    </nav>
    <div class=musiclist>
        <h1>Music List</h1>
        <h2><a href="insert_song.php">Add new song!</a></h2>
        <?php
        echo "<form method='post'>";
        require 'connect.php';
        mysqli_set_charset($conn, 'UTF8');
        $check_account = "SELECT * FROM users WHERE user_name = '" . $_SESSION['username'] . "'";
        $check_account_type = $conn->query($check_account);
        if ($check_account_type->num_rows > 0) {
            while ($row = $check_account_type->fetch_assoc()) {
                if ($row['account_type'] == 3) {
                    $sql = "SELECT * FROM songs WHERE user ='" . $_SESSION['username'] . "'";
                } else {
                    $sql = "SELECT * FROM songs";
                }
            }
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='song'>";
                echo "<a href=''><img height='250px' width='250px' src='Images/Song/" . $row['image'] . "'></a>";
                echo "<b>" . $row['title'] . "</b>";
                echo "<p>" . $row['artist'] . "</p>";
                echo "<p><a href='update_song.php?id=" . $row['id'] . "'>Update</a> | <span><a href='delete_song.php?id=" . $row['id'] . "'>Delete</a></span></p>";
                echo "</div>";
            }
            $conn->close();
        } else {
            echo "<h1>You haven't uploaded song yet!<a href='insert_song.php'>Click here to add new song!</a></h1>";
        }
        echo "</form>";
        ?>
    </div>
</body>
<?php
if (isset($_POST['delete'])) {
}
?>

</html>