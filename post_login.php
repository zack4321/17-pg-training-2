<?php
require_once 'functions.php';
// ログインページ

session_start();

$user_id = $_POST['user_id'];

$database = getDatabase();
$user = $database->query("
    SELECT *
    FROM `user`
    WHERE `id` = {$user_id}
")->fetch(PDO::FETCH_ASSOC);

if ($user === false) {
    // ログイン失敗
    header('Location: /login.php');
} else {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $user['name'];
    header('Location: /');
}
