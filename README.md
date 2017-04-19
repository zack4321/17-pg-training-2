# Yastodon

## インストール

### MAMPをインストール

[MAMP](https://www.mamp.info/en/)

### ターミナルを開く

### コマンドを打つ

```sh
# 設定を変える(display_errorsをOnに)
sed -ie '/^display_errors/s/Off/On/' /Applications/MAMP/bin/php/php7.1.1/conf/php.ini

# MAMPを開いて「サーバーを起動」
open /Applications/MAMP/MAMP.app

# このリポジトリをクローンする
git clone https://github.com/sossii/17-pg-training ~/17-pg-training
cd ~/17-pg-training

# データベース初期化
/Applications/MAMP/Library/bin/mysql -P 8889 -u root -proot < ~/17-pg-training/init.sql

# シンボリックリンクを貼る
ln -s ~/17-pg-training /Applications/MAMP/htdocs

# 開いてみる
open http://localhost:8888
```
