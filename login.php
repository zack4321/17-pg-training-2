<?php
// ログインページ

?>

<link rel="stylesheet" href="/css/style.css">

<div>ログイン</div>
<form method="post" action="/post_login.php">
    <input name="login_name" required>
    <input type="submit" value="ログイン">
</form>

<div>新規登録</div>
<form method="post" action="/post_signup.php">
    ID @<input name="login_name" required>
    表示名<input name="display_name" required>
    <input type="submit" value="新規登録">
</form>
