# 開発を始める

TODO: 丁寧に書く

- このリポジトリをそのマシンにcloneする

- MAMPをインストールする

- `vim /Applications/MAMP/bin/php/php7.1.1/conf/php.ini`
  - display_errorをonにする

- `/Applications/MAMP/MAMP.app` を開く
  - サーバーを開く を押す
  
- `/Applications/MAMP/Library/bin/mysql -P 8889 -u root -proot < [このリポジトリをcloneした場所]/init.sql`
でデータベース初期化

- `ln -s [このリポジトリをcloneした場所] /Applications/MAMP/htdocs` でシンボリックリンクを貼る
   - 例: `ln -s ~/17-pg-training /Applications/MAMP/htdocs`

- http://localhost:8888 を見てみる
