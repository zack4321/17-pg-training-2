<?php
// お題一覧ページ

$pdo = new PDO('mysql:host=localhost;port=8889;dbname=database', 'root', 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$questions = $pdo->query("
    SELECT *
    FROM `question`
    ORDER BY `created_at` DESC
")->fetchAll(PDO::FETCH_ASSOC);

?>

<div>お題一覧</div>
<?php foreach($questions as $question): ?>
    <div><?= $question['user_id'] ?></div>
    <img src="/image/<?= $question['image_file_name'] ?>">
<?php endforeach; ?>
