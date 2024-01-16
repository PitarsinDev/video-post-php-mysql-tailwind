<?php
// เชื่อมต่อกับฐานข้อมูล
$mysqli = new mysqli("localhost", "root", "", "video_system");

// ตรวจสอบการเชื่อมต่อ
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['post_id'];

    $query = "UPDATE posts SET likes = likes + 1 WHERE id = $post_id";
    $result = $mysqli->query($query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $mysqli->error;
    }
}
?>