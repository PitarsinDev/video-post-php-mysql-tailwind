<?php
// เชื่อมต่อกับฐานข้อมูล
$mysqli = new mysqli("localhost", "root", "", "video_system");

// ตรวจสอบการเชื่อมต่อ
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $video_link = $_POST['video_link'];

    $query = "INSERT INTO posts (title, video_link) VALUES ('$title', '$video_link')";
    $result = $mysqli->query($query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $mysqli->error;
    }
}
?>