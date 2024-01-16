<?php
        // เชื่อมต่อกับฐานข้อมูล
    $mysqli = new mysqli("localhost", "root", "", "video_system");

    // ตรวจสอบการเชื่อมต่อ
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // ดึงข้อมูลจากฐานข้อมูล
    $query = "SELECT * FROM posts";
    $result = $mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Video</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

    <div class='flex justify-center'>
        <div class='p-10'>
            <h2 class='text-3xl text-center'>Add <span class='text-orange-500'>Video</span></h2>
            <div class='w-5 h-1 rounded-full bg-orange-500'></div>
        </div>
    </div>
    <div class='flex justify-center'>
        <form method="post" action="add_video.php">
            <div class='flex gap-2'>
                <label for="title" class='text-blue-500'>Title :</label>
                <input type="text" name="title" required class='border border-blue-500 rounded-full pl-2'>
            </div>
            <br>
            <br>
            <div class='flex gap-2'>
                <label for="video_link" class='text-orange-500'>Video Link :</label>
                <input type="text" name="video_link" required class='border border-orange-500 rounded-full pl-2 shadow-sm'>
            </div>
            <div class='flex justify-center pt-5'>
                <button type="submit" class='text-green-500 shadow-sm bg-green-200 rounded-full px-5'>Add Video</button>
            </div>
        </form>
    </div>

    <div class='flex justify-center py-10'>
        <a href="index.php" class='text-rose-500 bg-rose-200 rounded-full px-5'>
            Back to home
        </a>
    </div>
    
</body>
</html>