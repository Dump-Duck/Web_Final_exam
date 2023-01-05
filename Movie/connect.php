<?php
  $severname = "localhost";
  $username = "root";
  $password = ""; // ko co pass
  $db = "mangadb";
  // Create connection
  $conn = new mysqli($severname, $username, $password, $db);
  // Check connection
  if ($conn -> connect_error) {
      die("Connection failed:". $conn -> connect_error);
  }
?>