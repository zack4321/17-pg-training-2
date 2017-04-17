<?php
// トップページ
require_once 'functions.php';

session_start();
redirectToLoginPageIfNotLoggedIn();

$user_name = $_SESSION['user_name'];

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

<link rel="stylesheet" href="/css/style.css">

<div class="wrapper">

    <div class="container">
        <div><?= $user_name ?></div>
        <form enctype="multipart/form-data" method="post" action="/post_toot.php">
            <input type="file" name="image">
            <textarea name="text" placeholder="今なにしてる？" required></textarea>
            <input type="submit" value="トゥート!">
        </form>
    </div>

    <div class="container toot-container">
        <div class="label">ホーム</div>

        <div class="contents">
            <?php foreach($toots as $toot) { ?>

                <div class="toot-item">
                    <div class="left-container">
                        <div class="user-icon"></div>
                    </div>
                    <div class="right-container">
                        <div class="user-name"><?= $toot['user']['name'] ?></div>
                        <div class="text"><?= nl2br($toot['text']) ?></div>

                        <?php if ($toot['image_file_name'] !== '') { ?>
                            <img src="/image/<?= $toot['image_file_name'] ?>" width="300px">
                        <?php } ?>

                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

</div>

