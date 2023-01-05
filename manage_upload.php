<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Upload</title>
    <style>
        p{
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }
        a{
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            padding: 10px 15px;
        }
        a:hover{
            color: green;
        }
        button{
            background: #04aa6d;
            border: none;
            padding: 10px 1px;
        }
        #delete{
            color: #fff;
            font-size: 18px;
            padding: 10px 15px;
        }
        #delete:hover{
            color: green;
            cursor: pointer;
        }
        #home{
            margin-left: 905px;
        }
        button:hover{
            border: 0.1px solid #04aa6d;
            background: #fff;
        }
        table{
            border: 1px solid #000;
            border-collapse: collapse;
            position: fixed;
            top: 150px;
            right: 360px;
        }
        td{
            border: 1px solid #000;
            text-align: center;
            font-size: 18px;
            padding: 20px;
        }
        #head{
            font-weight: bold;
            background: lightblue;
        }
    </style>
</head>
<body>
    <p>Manage Your Upload Content</p>
    <form method="post">
        <table>
            <tr>
                <td id="head">ID</td>         
                <td id="head">Cover img</td>          
                <td id="head">Name</td>           
                <td id="head">Category</td>           
                <td id="head">Created date</td>           
                <td id="head">Updated date</td>           
                <td id="head">Action</td>         
            <tr>
            <?php
                session_start();
                require 'connect.php';
                $upload = $_SESSION['username'];
                $show_all_upload = "select contents.id, name, category, create_date, update_date, cover_img from contents where upload_by = '$upload'";
                $result_show = $conn->query($show_all_upload);
                if($result_show->num_rows>0) {
                    while($row = $result_show->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row['id']."</td>
                                <td><img src='img/".$row['cover_img']."' width='90' height='90'></td>
                                <td>".$row['name']."</td>
                                <td>".$row['category']."</td>
                                <td>".$row['create_date']."</td>
                                <td>".$row['update_date']."</td>
                                <td><button><a href='update_new_chap.php?id=".$row['id']."' target='_self'>Update New Chap</a></button>
                                    <button id='delete' name='delete' value='".$row['id']."'>Delete</button></td>

                            </tr>";
                    }
                } else { echo "Nothing found!";}
            ?>
    <button id="home"><a href="manga_page.php">Home</a></button>
    </form>
    <?php 
        require 'connect.php';
        if(isset($_POST['delete'])) {
            $id = $_POST['delete'];
            $delete = "delete from contents where id ='$id'";
            $result = $conn->query($delete);
            header ('location: manage_upload.php');
            echo "Successfully deleted!";
        }
    ?>
</body>
<!-- <script src="Javascript/change_background_color.js"></script> -->
</html>