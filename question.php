<?php
require_once 'functions.php';
// お題ページ

$id = $_GET['id'];

$database = getDatabase();
$question = $database->query("
    SELECT *
    FROM `question`
    WHERE `id` = {$id}
")->fetch(PDO::FETCH_ASSOC);

?>

<div>お題</div>
<div><?= $question['user_id'] ?></div>
<img src="/image/<?= $question['image_file_name'] ?>">
