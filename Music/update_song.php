<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <ul>
        <?php
        session_start();
        require 'connect.php';
        if (isset($_SESSION['username'])) {
            echo "<li><a>" . $_SESSION['username'] . "</a></li>";
        }
        ?>
        <li><a href="music_page.php">Nghe nhạc</a></li>
        <li><a href="../Movie/movie_page.php">Xem phim</a></li>
        <li><a href="../manga_page.php">Đọc truyện</a></li>
        <li><a href="search.php">Tìm kiếm</a></li>
        <?php
        require 'connect.php';
        if (isset($_SESSION['username'])) {
            $check_account = "SELECT * FROM users WHERE user_name = '" . $_SESSION['username'] . "'";
            $check_account_type = $conn->query($check_account);
            if ($check_account_type->num_rows > 0) {
                while ($row = $check_account_type->fetch_assoc()) {
                    if ($row['account_type'] == 1 or $row['account_type'] == 3) {
                        echo "<li><a href='song_manage.php'>Quản lý nhạc</a></li>";
                        echo "<li><a href='../logout.php'>Đăng xuất</a></li>";
                    } else {
                        echo "<li><a href='../logout.php'>Đăng xuất</a></li>";
                    }
                }
            }
        } else {
            echo "<li><a href='../login.php'>Đăng nhập</a></li>";
        }
        ?>
    </ul>
    <hr>
    <h1 style='text-align: center'>Update Song</h1>
    <?php
    require 'connect.php';
    mysqli_set_charset($conn, 'UTF8');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM songs WHERE id = '$id'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $artist = $row['artist'];
            $genre = $row['genre_id'];
            $national = $row['national_id'];;
            $image = $row['image'];
    ?>
            <form method="post">
                <p>Id:<input type="text" name="id" readonly value='<?php echo $id; ?>'></p>
                <p>Title:<input type="text" name="title" value='<?php echo $title; ?>'></p>
                <p>Artist:<input type="text" name="artist" value='<?php echo $artist; ?>'></p>
                <p>Genre:<input type="text" name="genre" value='<?php echo $genre; ?>'></p>
                <p>National:<input type="text" name="national" value='<?php echo $national; ?>'></p>
                <p>Image:<?php echo "<img src='Images/song/$image' width='250px' height='250px'>"; ?></p>
                <input type="submit" name="update" value="Update">
            </form>
    <?php
        }
    }
    $conn->close();
    ?>
</body>
<?php
if (isset($_POST['update'])) {
    require 'connect.php';
    $id = $_POST['id'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];
    $national = $_POST['national'];;
    $sql = "UPDATE songs SET title = '$title', artist='$artist', genre_id='$genre', national_id='$national' WHERE id = '$id'";
    if ($conn->query($sql) == TRUE) {
        echo "Update song successfully! <a href='song_manage.php'>Click here to go to management page!</a>";
    } else {
        echo "Update song failed!" . $conn->error;
    }
    $conn->close();
}
?>

</html>