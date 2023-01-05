<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
</head>

<body>
    <ul>
        <?php
            session_start();
            if (isset($_SESSION['username'])){
                echo "<li>Hello ". $_SESSION['username'] ."</li>";
                echo "<li><a href='logout.php'>Logout</a></li>";
                echo "<li><a href='create.php'>Add</a></li>";
            }
            else{
                echo "<li><a href='login.php'>Login</a></li>";
            }

        ?>
        <li><a href='movie_page.php'>Home</a></li>
        <li><a href="search.php">Search</a></li>
    </ul>
    <h1>Movie List</h1>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Cast</td>
            <td>Plot</td>
            <td>Genre</td>
            <td>Director</td>
            <td>Time</td>
            <td>Date</td>
            <td>Country</td>
            <td>Tags</td>
        </tr>
        <?php
        require 'connect.php';
        $query = mysqli_query($conn, "select * from `movie`");
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['cast']; ?></td>
                <td><?php echo $row['plot']; ?></td>
                <td><?php echo $row['genre']; ?></td>
                <td><?php echo $row['director']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['country']; ?></td>
                <td><?php echo $row['tags']; ?></td>
                <?php
                    if (isset($_SESSION['username'])){
                        echo "<td><a href='edit.php?id=". $row['id'] ."'>Edit</a></td>";
                        echo "<td><a href='delete.php?id=".$row['id'] ."'>Delete</a></td>";
                    }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>