<?php
// トップページ
require_once 'functions.php';

session_start();
redirectToLoginPageIfNotLoggedIn();

$database = getDatabase();

$toots = $database->query("
    SELECT *
    FROM `toot`
    ORDER BY `created_at` DESC
")->fetchAll(PDO::FETCH_ASSOC);

foreach ($toots as $i => $toot) {
    $user = $database->query("
        SELECT *
        FROM `user`
        WHERE `id` = {$toot['user_id']}
    ")->fetch(PDO::FETCH_ASSOC);

    $toots[$i]['user'] = $user;
}

?>

<form enctype="multipart/form-data" method="post" action="/submit_toot.php">
    <input type="file" name="image">
    <textarea name="text" placeholder="今なにしてる？" required></textarea>
    <input type="submit" value="トゥート!">
</form>

<div>ホーム</div>
<?php foreach($toots as $toot) { ?>

    <a href="toot.php?id=<?= $toot['id'] ?>">
        <div class="question-item">
            <div><?= $toot['user']['name'] ?></div>
            <div><?= $toot['text'] ?></div>
            <?php if ($toot['image_file_name'] !== '') { ?>
                <img src="/image/<?= $toot['image_file_name'] ?>" width="300px">
            <?php } ?>
        </div>
    </a>
<?php } ?>
