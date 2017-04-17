<?php
// お題投稿

$user_id = 0;
$created_at = date('Y-m-d H:i:s');

$image_file_name = md5(mt_rand()) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$upload_path = dirname(__FILE__) . '/image/' . $image_file_name;
move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);

$pdo = new PDO('mysql:host=localhost;port=8889;dbname=database', 'root', 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$pdo->query("
    INSERT INTO `question` (
        `user_id`,
        `image_file_name`,
        `created_at`
    ) VALUES (
        {$user_id},
        '{$image_file_name}',
        '{$created_at}'
    )
");

header('Location: /question_list.php');
