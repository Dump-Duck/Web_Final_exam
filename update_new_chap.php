<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Chap</title>
</head>
<body>
    <button><a href="manga_page.php">Back to Home Page</a></button><br><br>
    <form method="post" enctype="multipart/form-data">
        <p>Chapter ID: </p><input type="number" name="chap_id" placeholder="Chapter ID">
        <p>Chap content: </p><textarea name="chap_content" placeholder="Chapter content" rows="10" cols="100"></textarea><br><br>
        <p>Upload image: </p><input type="file" name="image[]" multiple>
        <input type="submit" name="upload" value="Upload">
    </form>
    <?php 
        if(isset($_POST['upload'])) {
            error_reporting(0);
            require 'connect.php';
            date_default_timezone_set('Asia/Bangkok'); 
            $update_date = date('Y/m/d h:i:s', time());
            $name_id = $_GET['id'];
            $chap_id = $_POST['chap_id'];
            $chap_content = $_POST['chap_content'];
            $name_content = $conn->query("select name from contents where id='$name_id'")->fetch_assoc();
            $all_img = "";
            foreach($_FILES['image']['name'] as $key=>$value){
                $name = $_FILES['image']['name'][$key];
                $name_tmp = $_FILES['image']['tmp_name'][$key];
                $all_img .= $name ." ";
                $folder = "./img"."/".$name_content['name']." - Chap ".$chap_id."/".$name;
                $folder_load = mkdir(dirname($folder));
                move_uploaded_file($name_tmp, $folder);
            }
            $upload_sql = "insert into chaps (chap_id, chap_content, name_id, img_content, update_time) values ('$chap_id', '$chap_content', '$name_id', '$all_img', '$update_date')";
            $upload_sql_2 = "update contents set contents.update_date = '$update_date' where contents.id = '$name_id'";
            $sql = [$upload_sql, $upload_sql_2];
            foreach($sql as $query) {
                $result = $conn->query($query);
            }
            if($result==FALSE) {
                echo "Something went wrong, please try again!";
                return FALSE;
            } else { echo "Your contents were successfully uploaded! <a href = 'manage_upload.php'>Manage</a>"; }
        }
    ?>
</body>
</html>