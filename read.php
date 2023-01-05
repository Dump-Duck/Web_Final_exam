<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read <?php
                require 'connect.php';
                $name_id = $_GET['id'];
                $name_sql = "select name from contents where id='$name_id'";
                if($conn->query($name_sql)==TRUE){ $name = $conn->query($name_sql)->fetch_assoc(); echo $name['name']; }
                $chapter_number = $_GET['chapter'];
                echo " chap " . $chapter_number;
            ?></title>
</head>
<body>
    <?php
        $next = $chapter_number + 1;
        $prev = $chapter_number - 1;
        $select_type_content = "select type_content from contents where id='$name_id'";
        $query_type = $conn->query($select_type_content);
        if($query_type->num_rows>0){
            $type = $query_type->fetch_assoc();
            if($type['type_content']==2 || $type['type_content']==3){
                $sql_1 = "select chap_content, img_content from chaps where name_id='$name_id' and chap_id='$chapter_number'";
                $query_1 = $conn->query($sql_1);
                if($query_1->num_rows>0){
                    $content = $query_1->fetch_assoc();
                    echo $content['chap_content'];
                    if($content['img_content']==""){ echo "";}
                    else{
                        $imgs1 = trim($content['img_content']);
                        $imgs = explode(" ", $imgs1);
                        echo "<p>Illustration: </p>";
                        foreach($imgs as $illustration){
                            echo "<img src='img/".$name['name']." - Chap ".$chapter_number."/".$illustration."' width='300' height='350'>";
                        }
                    }
                    echo "<br><hr>
                    <p><button><a href='manga_page.php'>Home</a></button> 
                    <button><a href='info_comic.php?id=".$name_id."'>Info</a></button> 
                    <button><a href='info_comic.php?id=".$name_id."&chapter=".$prev."'>Prev chap</a></button>
                    <button><a href='read.php?id=".$name_id."&chapter=".$next."'>Next chap</a></button>";
                }
            } else {

                $sql = "select img_content from chaps where name_id='$name_id' and chap_id='$chapter_number'";
                $query = $conn->query($sql);
                if($query->num_rows>0){
                    $row = $query->fetch_assoc();
                    $arr_img1 = trim($row['img_content']);
                    $arr_img = explode(" ", $arr_img1);
                    foreach($arr_img as $img){
                        echo "<img src='img/".$name['name']." - Chap ".$chapter_number."/".$img."' width='500' height='650'><br>";
                    }
                    echo "<br><hr>
                    <p><button><a href='manga_page.php'>Home</a></button> 
                    <button><a href='info_comic.php?id=".$name_id."'>Info</a></button> 
                    <button><a href='info_comic.php?id=".$name_id."&chapter=".$prev."'>Prev chap</a></button>
                    <button><a href='read.php?id=".$name_id."&chapter=".$next."'>Next chap</a></button>";
                }
            }
        }
    ?>
</body>
</html>