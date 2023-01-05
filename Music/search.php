<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
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
    <form method="get">
        <p>Search song by name: <input type="text" name="title">
            <input type="submit" name="title_search" value="Search">
        </p>
    </form>
    <?php
    if (isset($_GET['title_search'])) {
        $title = $_GET['title'];
        require 'connect.php';
        mysqli_set_charset($conn, 'UTF8');
        $sql = "SELECT * FROM songs WHERE title = '$title'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a href=''><img height='250px' width='250px' src='Images/Song/" . $row['image'] . "'></a><br>";
                    echo "<b>" . $row['title'] . "</b>";
                    echo "<p>" . $row['artist'] . "</p>";
                }
            }
        } else {
            echo "Our website currently doesn't have the song you're looking for!";
        }
    }
    ?>
    <hr>
    <form method="get">
        <p>Search song by national: <select name="national">
                <?php
                require 'connect.php';
                mysqli_set_charset($conn, 'UTF8');
                $sql = "SELECT national FROM nationals";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option>", $row['national'], "</option>";
                }
                ?>
            </select>
            <input type="submit" name="national_search" value="Search">
        </p>
    </form>
    <?php
    if (isset($_GET['national_search'])) {
        $national = $_GET['national'];
        require 'connect.php';
        mysqli_set_charset($conn, 'UTF8');
        $sql = "SELECT * FROM songs, nationals WHERE nationals.national = '$national' AND nationals.id = songs.national_id ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a href=''><img height='250px' width='250px' src='Images/Song/" . $row['image'] . "'></a><br>";
                    echo "<b>" . $row['title'] . "</b>";
                    echo "<p>" . $row['artist'] . "</p>";
                }
            }
        } else {
            echo "Our website currently doesn't have the song you're looking for!";
        }
    }
    ?>
    <hr>
    <form method="get">
        <p>Search song by genre: <select name="genre">
                <?php
                require 'connect.php';
                mysqli_set_charset($conn, 'UTF8');
                $sql = "SELECT genre FROM genres";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option>", $row['genre'], "</option>";
                }
                ?>
            </select>
            <input type="submit" name="genre_search" value="Search">
        </p>
    </form>
    <?php
    if (isset($_GET['genre_search'])) {
        $genre = $_GET['genre'];
        require 'connect.php';
        mysqli_set_charset($conn, 'UTF8');
        $sql = "SELECT * FROM songs, genres WHERE genres.genre = '$genre' AND genres.id = songs.genre_id ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a href=''><img height='250px' width='250px' src='Images/Song/" . $row['image'] . "'></a><br>";
                    echo "<b>" . $row['title'] . "</b>";
                    echo "<p>" . $row['artist'] . "</p>";
                }
            }
        } else {
            echo "Our website currently doesn't have the song you're looking for!";
        }
    }
    ?>
    <hr>
    <form method="get">
        <p>Search song by national: <select name="nat">
                <?php
                require 'connect.php';
                mysqli_set_charset($conn, 'UTF8');
                $sql = "SELECT national FROM nationals";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option>", $row['national'], "</option>";
                }
                ?>
            </select>
        </p>
        <p>Search song by genre and national: <select name="gen">
                <?php
                require 'connect.php';
                mysqli_set_charset($conn, 'UTF8');
                $sql = "SELECT genre FROM genres";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option>", $row['genre'], "</option>";
                }
                ?>
            </select>
            <input type="submit" name="combo_search" value="Search">
        </p>
    </form>
    <?php
    if (isset($_GET['combo_search'])) {
        $genre = $_GET['gen'];
        $national = $_GET['nat'];
        require 'connect.php';
        mysqli_set_charset($conn, 'UTF8');
        $sql = "SELECT * FROM songs, genres, nationals WHERE genres.genre = '$genre' AND genres.id = songs.genre_id AND nationals.national = '$national' AND nationals.id = songs.national_id ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a href=''><img height='250px' width='250px' src='Images/Song/" . $row['image'] . "'></a><br>";
                    echo "<b>" . $row['title'] . "</b>";
                    echo "<p>" . $row['artist'] . "</p>";
                }
            }
        } else {
            echo "Our website currently doesn't have the song you're looking for!";
        }
    }
    ?>
</body>

</html>