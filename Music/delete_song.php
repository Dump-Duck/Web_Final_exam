<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
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
    <h1 style='text-align: center'>Delete Song</h1>
    <h2>Are you sure want to delete the song below?</h2>
    <?php
    require 'connect.php';
    mysqli_set_charset($conn, 'UTF8');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM songs WHERE id = '$id'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
    ?>
            <form method="post">
                <p>Id:<input type="text" name="id" value="<?php echo $row['id']; ?>" readonly></p>
                <p>Title:<?php echo $row['title']; ?></p>
                <p>Artist:<?php echo $row['artist']; ?></p>
                <p>Genre:<?php
                            $genre_sql = "SELECT * FROM genres WHERE id = '" . $row['genre_id'] . "'";
                            $genre_query = $conn->query($genre_sql);
                            while ($genre_row = $genre_query->fetch_assoc()) {
                                echo $genre_row['genre'];
                            }
                            ?>
                </p>
                <p>National:<?php
                            $national_sql = "SELECT * FROM nationals WHERE id = '" . $row['national_id'] . "'";
                            $national_query = $conn->query($national_sql);
                            while ($national_row = $national_query->fetch_assoc()) {
                                echo $national_row['national'];
                            }
                            ?>
                </p>
                <p>Image:<?php echo "<img src='Images/song/" . $row['image'] . "' width='250px' height='250px'>"; ?></p>
                <input type="submit" name="delete" value="Delete">
                <p>If you don't want to delete this song,<a href='song_manage.php'>Click here</a> to back to management page.</p>
            </form>
    <?php
        }
    }
    $conn->close();
    ?>
</body>
<?php
if (isset($_POST['delete'])) {
    require 'connect.php';
    $id = $_POST['id'];
    $delete_sql = "DELETE FROM songs WHERE id = '$id'";
    if ($conn->query($delete_sql) == TRUE) {
        header("location: song_manage.php");
    }
    $conn->close();
}
?>

</html>