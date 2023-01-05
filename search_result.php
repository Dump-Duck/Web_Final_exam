<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
            margin-left: 20px;
            margin-bottom: 30px;
            cursor: pointer;
        }
        .name-title {
            display: block;
            text-decoration: none;
            color: black;
            text-align: center;
        }
        .dropdowncontent {
            display: none;
            position: absolute;
            left: 220px;
            top: 10px; 
            min-width: 160px;
            background-color:rgb(235, 228, 228);
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown:hover .min-img {
            filter: blur(2px);

        }
        .name-title:hover {
            color: #28a745;
        }
        .dropdown:hover .dropdowncontent {
            display: block;
        }
        .desc {
            padding: 15px;
            overflow-x:hidden;
        }
    </style>
</head>
<body>
<h1>Search result:</h1>
    <?php
        require 'connect.php';
        $search = $_GET['category'];
        $search_sql = "select * from contents where name like '%$search%' or type_content='$search'";
        $search_result = $conn->query($search_sql);
        if($search_result->num_rows == 0) {
            echo "<img src='Pic/404.jpg'>";
        } else {
            while($row = $search_result->fetch_assoc()) {
                echo "
                    <div class='dropdown'>
                        <img src='img/".$row['cover_img']."' alt='".$row['name']."' class='min-img' width='200' height='275'>
                        <a href='info_comic.php?id=".$row['id']."' class='name-title'><b>".$row['name']."</b></a>
                        <div class='dropdowncontent'>
                            <img src='img/".$row['cover_img']."' alt='".$row['name']."' width='250' height='300'>
                            <div class='desc'><b>".$row['name']."</b>
                                <p>".$row['description']."</p>
                            </div>
                        </div>
                    </div>";
                    }
            }
    ?>
    <p><button><a href="manga_page.php">Home</a></button></p><br>
</body>
</html>