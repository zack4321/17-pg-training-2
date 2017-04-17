<?php
require_once 'functions.php';
// お題一覧ページ

$database = getDatabase();
$questions = $database->query("
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
