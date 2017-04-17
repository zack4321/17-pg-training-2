<?php
require_once 'functions.php';
// お題一覧ページ

session_start();
redirectToLoginPageIfNotLoggedIn();

$database = getDatabase();

// お題一覧を取得
$questions = $database->query("
    SELECT *
    FROM `question`
    ORDER BY `created_at` DESC
")->fetchAll(PDO::FETCH_ASSOC);

foreach ($questions as $i => $question) {
    $user = $database->query("
        SELECT *
        FROM `user`
        WHERE `id` = {$question['user_id']}
    ")->fetch(PDO::FETCH_ASSOC);

    $questions[$i]['user'] = $user;
}

?>

<link rel="stylesheet" href="/css/style.css">

<div>
    ようこそ[<?= $_SESSION['user_name'] ?>]さん
    <a href="/logout.php">ログアウト</a>
</div>

<div>お題一覧</div>
<?php foreach($questions as $question): ?>
    <a href="question.php?id=<?= $question['id'] ?>">
        <div class="question-item">
            <div><?= $question['user']['name'] ?>さんのお題</div>
            <img src="/image/<?= $question['image_file_name'] ?>" width="300px">
        </div>
    </a>
<?php endforeach; ?>
