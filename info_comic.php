<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info <?php
                require 'connect.php';
                $name_id = $_GET['id'];
                $name_sql = "select name from contents where id='$name_id'";
                if($conn->query($name_sql)==TRUE){ $name = $conn->query($name_sql)->fetch_assoc(); echo $name['name']; }
                
            ?></title>
    <style>
        table {
            border-collapse: collapse;
        }
        .chap {
            width: 350px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        require 'connect.php';
        $id = $_GET['id'];
        $info = "select * from contents where id='$id'";
        $result = $conn->query($info);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $type_content = $row['type_content'];
                $type = "select type_of_content from type_contents where id='$type_content'";
                $type_of_content = $conn->query($type)->fetch_assoc();
                echo "<h1>".$row['name']."</h1>
                <img src='img/".$row['cover_img']."' width='200' height='250'>
                <p><h3>Category: </h3>".$type_of_content['type_of_content']."</p>
                <p><h3>Description: </h3>".$row['description']."</p>
                <p><b>Genres: </b>".$row['category']."</p>
                <p><b>Posted on: </b>".$row['create_date']."</p>
                <p><b>Last update: </b>".$row['update_date']."</p>
                <p><b>Uploaded by: </b>".$row['upload_by']."</p><hr>";
            }
            echo "<h2>List of chapters</h2>";
            $chap_sql = "select chap_id, update_time from chaps where name_id = '$id'";
            $chapters = $conn->query($chap_sql);
            if($chapters->num_rows > 0) {
                echo "<form method='post'>
                <table border=1>
                            <tr>
                                <th></th>
                                <th>Uploaded on</th>
                            </tr>";
                while($chap = $chapters->fetch_assoc()) {
                    echo"<tr>
                            <td class='chap'><a href='read.php?id=".$id."&chapter=".$chap['chap_id']."'>Chap ".$chap['chap_id']."</td>
                            <td>".$chap['update_time']."</td>
                        </tr>";
                }
                echo "</table>
                </form>";
            } else { echo "This contents has not been uploaded, contents will arrive soon. Please wait and try again later."; }

        } else { echo "Can't find any information about this contents!"; }
    ?><br><hr><button><a href="manga_page.php">Home</a></button>
</body>
</html>