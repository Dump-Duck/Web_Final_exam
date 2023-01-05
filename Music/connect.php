<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "mangadb";

    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }
?>