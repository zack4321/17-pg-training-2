<?php


/**
 * データベースへ接続するためのオブジェクトを取得する
 *
 * @return PDO
 */
function getDatabase() {
    return new PDO('mysql:host=localhost;port=8889;dbname=database', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
