<?php
if ($result->num_rows > 0) // kiểm tra có kết quả trả về (2D array)
{ // nếu còn dữ liệu trong bảng
    echo "<table border='1' width=50% align='center'>
          <caption> <b>Bảng thông tin phim</caption>
          <tr>
              <th>ID</th>
              <th>name</th>
              
          </tr>";
    while($row = $result->fetch_assoc()) #cú pháp đọc từng row của kết quả trả về
    { // đọc dữ liệu từng dòng
        if ($row["id"]%2==0)
        {
            echo "<tr class='odd'><td>" . $row["id"]. "</td>";
        }
        else
        {
            echo "<tr class='even'><td>" . $row["id"]. "</td>";
        }
echo "<td>" . $row["name"]. "</td></tr>" ;

    }
}
else {
    echo "Không tìm thấy phim";
}
?>    