<?php
include_once('connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM movie WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
echo "<a href='movie_page.php'>Về trang chủ</a>";
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>