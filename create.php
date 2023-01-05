<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <style>
        h1{
            text-align: center;
        }
        form{
            display: block;
            border: 1px solid #000;
            margin: 50px 470px;
            background: lightgoldenrodyellow;
        }
        p{
            margin-left: 15px;
            font-size: 20px;
        }
        textarea{
            margin-left: 15px;
            width: 905px;
            height: 220px;
            font-size: 18px;
            padding: 5px;
        }
        input[type="text"]{
            font-size: 18px;
            width: 700px;
            height: 30px;
            padding: 5px;
        }
        input[type="checkbox"]:hover{
            cursor: pointer;
        }
        select{
            cursor: pointer;
            padding: 5px 10px;
            width: 300px;
            text-align: center;
            font-size: 14px;

        }
        input[type="submit"]{
            display: block;
            background: #04aa6d;
            color: #fff;
            padding: 10px 15px;
            border: none;
            margin: 2px 380px;
        }
        input[type="submit"]:hover{
            cursor: pointer;
            background: #fff;
            color: green;
            border: 0.1px solid #04aa6d;
            border-radius: 4px;
        }
        a{
            text-decoration: none;
            font-size: 18px;
            padding: 10px 15px;
            color: #fff;
        }
        a:hover{
            color: green;
        }
        button{
            display: inline-block;
            background-color: #04aa6d;
            border: none;
            padding: 10px 1px;
            margin-left: 520px;
        }
        button:hover{
            border: 0.1px solid #04aa6d;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <h1>Upload your new content</h1>
    <form method="post" enctype="multipart/form-data">
        <p>Title: <input type="text" autocomplete="off" name="name" placeholder="Title"></p>
        <p>Description: </p><textarea name="description" placeholder="Description" rows="10" cols="100"></textarea><br>
        <p>Category: 
        <?php
            require 'connect.php';
            $all_categories = "select * from categories";
            $result_categories = $conn->query($all_categories);
            if($result_categories->num_rows>0) {
                while($category = $result_categories->fetch_assoc()) {
                    echo "<input type='checkbox' name='category[]' value='".$category['category']."'>".$category['category'];
                }
            }
        ?></p>
        <p>Type: <select name="type">
        <?php
            require 'connect.php';
            $types = "select * from type_contents";
            $all_type = $conn->query($types);
            if($all_type->num_rows>0) {
                while($type = $all_type->fetch_assoc()) {
                    echo "<option value='".$type['id']."'>".$type['type_of_content']."</option>";
                }
            }
        ?></select></p>
        <p>Cover Image: <input type="file" name="cover_img"></p>
        <p><input type="submit" name="add" value="Create New Content"></p>
    </form>
    <?php 
        session_start();
        require 'connect.php';
        if(isset($_POST['add'])){
            date_default_timezone_set('Asia/Bangkok'); 
            $date_create = date('Y/m/d', time());
            $title = $_POST['name'];
            $description = $_POST['description'];
            $categories = $_POST['category'];
            $type_of_content = $_POST['type'];
            $upload_by = $_SESSION['username'];
            $img = $_FILES['cover_img']['name'];
            $tmp_img = $_FILES['cover_img']['tmp_name'];
            $folder = "./img/".$img;
            $ctgrs = "";
            foreach($categories as $ctgr){
                $ctgrs .= $ctgr. ' ';
                    
            } 
            if(move_uploaded_file($tmp_img, $folder)){
                $create = "insert into contents (name, description, create_date, category, upload_by, type_content, cover_img) 
                                values ('$title', '$description', '$date_create', '$ctgrs', '$upload_by', '$type_of_content', '$img')";
                $query = $conn->query($create);
                if($query==TRUE){
                    echo "<script>alert('Your new content has been uploaded successfully!');</script>";
                } else { echo "<script>alert('An error occurred while uploading! Try again later!'); return false;</script>"; }
            } else { echo "<script>alert('Error! Please check your content and try again!');
                return false;</script>"; }
        }
    ?>
    <br><br>
    <button><a href="manga_page.php">Back to home page</a></button> <button><a href="manage_upload.php">Manage Upload</a></button>
</body>
</html>