<!DOCTYPE html>
<html>

<head>
    <title>Editing MySQL Data</title>
    <link rel="stylesheet" href="" />
</head>

<body>
    <ul>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<li>Hello " . $_SESSION['username'] . "</li>";
            echo "<li><a href='logout.php'>Logout</a></li>";
            echo "<li><a href='create.php'>Add</a></li>";
        } else {
            echo "<li><a href='login.php'>Login</a></li>";
        }

        ?>
        <li><a href='movie_page.php'>Home</a></li>
        <li><a href="search.php">Search</a></li>
    </ul>
    <?php
    // Kết nối Database
    require 'connect.php';
    $id = $_GET['id'];
    $query = mysqli_query($conn, "select * from `movie` where id='$id'");
    $row = mysqli_fetch_assoc($query);
    ?>
    <form method="POST" class="form">
        <h2>Update movie</h2>
        <label>Name: <input type="text" value="<?php echo $row['name']; ?>" name="name"></label><br />
        <label>Cast: <input type="text" value="<?php echo $row['cast']; ?>" name="cast"></label><br />
        <label>Plot: <input type="text" value="<?php echo $row['plot']; ?>" name="plot"></label><br />
        <label>Genre: <input type="text" value="<?php echo $row['genre']; ?>" name="genre"></label><br />
        <label>Director: <input type="text" value="<?php echo $row['director']; ?>" name="director"></label><br />
        <label>Time: <input type="text" value="<?php echo $row['time']; ?>" name="time"></label><br />
        <label>Date: <input type="text" value="<?php echo $row['date']; ?>" name="date"></label><br />
        <label>Country: <input type="text" value="<?php echo $row['country']; ?>" name="country"></label><br />
        <label>Tags: <input type="text" value="<?php echo $row['tags']; ?>" name="tags"></label><br />
        <input type="submit" value="Update" name="update_movie">
    </form>

    <?php
    if (isset($_POST['update_movie'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $cast = $_POST['cast'];
        $plot = $_POST['plot'];
        $genre = $_POST['genre'];
        $director = $_POST['director'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $country = $_POST['country'];
        $tags = $_POST['tags'];
        // Create connection
        $conn = new mysqli("localhost", "root", "", "music");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPDATE movie SET name='$name' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    ?>
</body>

</html>