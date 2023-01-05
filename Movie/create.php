<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>movie</title>
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
    <h1>Add Movie</h1>
    <form method="post">
        Name: <input type="text" name="name" placeholder="Input Name"><br>
        Cast: <input type="text" name="cast" placeholder="Input Cast"><br>
        Plot: <input type="text" name="plot" placeholder="Input Plot"><br>
        Genre: <input type="text" name="genre" placeholder="Input Genre"><br>
        Director: <input type="text" name="director" placeholder="Input director"><br>
        Time: <input type="text" name="time" placeholder="Input Time"><br>
        Date: <input type="date" name="date" placeholder="Input Date"><br>
        Country: <input type="text" name="country" placeholder="Input Country"><br>
        Tags: <input type="text" name="tags" placeholder="Input Tags"><br>
        <input type="submit" name="add" value="Add">
    </form>
</body>
<?php
if (isset($_POST['add'])) {
    require 'connect.php';
    mysqli_set_charset($conn, 'UTF8');
    $name = $_POST['name'];
    $cast = $_POST['cast'];
    $plot = $_POST['plot'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $tags = $_POST['tags'];
    $sql = "INSERT INTO movie (name, cast, plot, genre, director, time, date, country, tags) VALUE ('$name', '$cast', '$plot', '$genre', '$director', '$time', '$date', '$country', '$tags')";
    if ($conn->query($sql) == TRUE) {
        echo "Successfully!";
    } else {
        echo "Fail!" . $conn->error;
    }
    $conn->close();
}
?>

</html>