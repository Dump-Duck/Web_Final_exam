<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new song</title>
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
    <?php
    if (isset($_SESSION['username'])) {
        require 'connect.php';
        mysqli_set_charset($conn, 'UTF8');
        echo
        "<form method='post'>
            <p>Title: <input type='text' name='title' required></p>
            <p>Artist: <input type='text' name='artist' required></p>
            <p>Genres:
            <select name='genre'>";
        $sql = 'SELECT * FROM genres';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['genre'] . "</option>";
        }
        echo "</select>
            </p>
            <p>National:
            <select name='national'>";
        $sql = "SELECT * FROM nationals";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['national'] . "</option>";
        }
        echo "</select>
            </p>
            <p>Cover Image: <input type='file' name='image' required></p>
            <p><input type='submit' value='Add' name='add' /></p>
            </form>";
    }
    ?>
</body>
<?php
if (isset($_POST['add'])) {
    require 'connect.php';
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];
    $national = $_POST['national'];;
    $image = $_POST['image'];
    $sql = "INSERT INTO songs (title, artist, genre_id, national_id, image, user) VALUE ('$title', '$artist', '$genre', '$national', '$image', '" . $_SESSION['username'] . "')";
    if ($conn->query($sql) == TRUE) {
        echo "Add new song successfully! <a href='song_manage.php'>Click here to go to management page!</a>";
    } else {
        echo "Add new song failed!" . $conn->error;
    }
    $conn->close();
}
?>

</html>