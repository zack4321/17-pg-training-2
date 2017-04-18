<?php
require_once 'functions.php';
// ユーザー新規登録

$login_name = $_POST['login_name'];
$display_name = $_POST['display_name'];

// if ($_FILES['image']['name'] === '') {
//     $image_file_name = '';
// } else {
//     $image_file_name = md5(mt_rand()) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
//     $upload_path = dirname(__FILE__) . '/image/' . $image_file_name;
//     move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
// }

$database = getDatabase();

$user = $database->query("
    SELECT *
    FROM `user`
    WHERE `login_name` = '{$login_name}'
")->fetch(PDO::FETCH_ASSOC);

if ($user === false) {
    // 同じlogin_nameを持つユーザーがいなかったら新規登録
    $database->query("
        INSERT INTO `user` (
            `login_name`,
            `display_name`
        ) VALUES (
            '{$login_name}',
            '{$display_name}'
        )
    ");
}

header('Location: /login.php');
