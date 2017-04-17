<?php
// お題ページ

$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;port=8889;dbname=database', 'root', 'root');
$question = $pdo->query("
    SELECT *
    FROM `question`
    WHERE `id` = {$id}
")->fetch(PDO::FETCH_ASSOC);

?>

<div>お題</div>
<div><?= $question['user_id'] ?></div>
<img src="/image/<?= $question['image_file_name'] ?>">
