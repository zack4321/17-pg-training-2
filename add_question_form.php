<?php
// お題投稿ページ

?>
<div>お題投稿</div>
<form enctype="multipart/form-data" method="post" action="/add_question.php">
    <input type="file" name="image" required>
    <input type="submit" value="送信する">
</form>
