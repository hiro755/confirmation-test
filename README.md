環境構築
Dockerビルド
1.git clone git@github.com:hiro755/confirmation-test.git
2.docker-compose up -d -build

Laravel環境構築
0.cd　coachtech/confirmation-test
1.docker-compsoe exec php bash
2.composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

使用技術
・PHP 8.1-fpm
・Laravel 10.0
・MySQL 8.0

URL
・開発環境：http://localhost/register
・phpMyAdmin:http://localhost:8080/

ER図
<img width="1920" height="1080" alt="スクリーンショット 2025-08-03 100853" src="https://github.com/user-attachments/assets/16aa8622-07bd-4b71-85d7-7d47c5836569" />
