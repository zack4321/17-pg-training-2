<?php
require_once 'functions.php';
// お題一覧ページ

session_start();
redirectToLoginPageIfNotLoggedIn();

$database = getDatabase();

// お題一覧を取得
$answers = $database->query("
    SELECT *
    FROM `answer`
    ORDER BY `created_at` DESC
")->fetchAll(PDO::FETCH_ASSOC);

foreach ($answers as $i => $answer) {
    $user = $database->query("
        SELECT *
        FROM `user`
        WHERE `id` = {$answer['user_id']}
    ")->fetch(PDO::FETCH_ASSOC);

    $answers[$i]['user'] = $user;

    $question = $database->query("
        SELECT *
        FROM `question`
        WHERE `id` = {$answer['question_id']}
    ")->fetch(PDO::FETCH_ASSOC);

    $answers[$i]['question'] = $question;
}

?>

<link rel="stylesheet" href="/css/style.css">

<div>
    ようこそ[<?= $_SESSION['user_name'] ?>]さん
    <a href="/logout.php">ログアウト</a>
</div>

<?php foreach($answers as $answer): ?>
    <a href="answer.php?id=<?= $answer['id'] ?>">
        <div class="answer-item">
            <img src="/image/<?= $answer['question']['image_file_name'] ?>" width="300px">
            <div class="text"><?= $answer['text'] ?></div>
            <div class="user">by <?= $answer['user']['name'] ?></div>
        </div>
    </a>
<?php endforeach; ?>
