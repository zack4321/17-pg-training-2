<?php
require_once 'functions.php';
// トゥート投稿

session_start();
redirectToLoginPageIfNotLoggedIn();

$user_id = $_SESSION['user_id'];

$text = $_POST['text'];

if ($_FILES['image']['name'] === '') {
    $image_file_name = '';
} else {
    $image_file_name = md5(mt_rand()) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $upload_path = dirname(__FILE__) . '/image/' . $image_file_name;
    move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
}

$created_at = date('Y-m-d H:i:s');

$database = getDatabase();
$database->query("
    INSERT INTO `user` (
        `user_id`,
        `text`,
        `image_file_name`,
        `created_at`
    ) VALUES (
        {$user_id},
        '{$text}',
        '{$image_file_name}',
        '{$created_at}'
    )
");

header('Location: /');
