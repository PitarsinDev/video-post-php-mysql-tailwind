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
    <title>Video System</title>
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
            <h1 class='text-3xl text-zinc-800'>Video <span class='text-orange-500'>System</span></h1>
            <div class='w-6 h-1 rounded-full bg-orange-500'></div>
        </div>
    </div>

    <div class='flex justify-center'>
        <a href="video_add.php" class='bg-green-200 text-green-500 px-10 rounded-full shadow-sm'>Add Video</a>
    </div>

    <div class='grid grid-cols-2 py-10'>
    <!-- แสดงรายการวิดิโอ -->
    <?php while ($row = $result->fetch_assoc()) : ?>
        <div class='flex justify-center'>
            <div class='border p-2 rounded-xl shadow-md mb-10'>
                <h2 class='text-blue-500 pb-2'><?= $row['title']; ?></h2>
                <video width="300" height="315" class="rounded-xl shadow-md" src="<?= $row['video_link']; ?>" controls>
                </video> 
                <div class=" pt-4 flex">
                    <div class="flex gap-2 bg-blue-200 text-blue-500 px-5 rounded-md">
                        <p class='text-orange-500'><?= $row['likes']; ?></p>
                        <form method="post" action="like.php">
                            <input type="hidden" name="post_id" value="<?= $row['id']; ?>">
                            <button type="submit">Like</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>

    <footer class='pb-10'>
        <h1 class='text-sm text-blue-500 text-center'>Nomads <span class='text-orange-500'>Developer</span></h1>
    </footer>

</body>

</html>