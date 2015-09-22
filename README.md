1) You must have composer installed to your system and set environment variable for that. On windows, it automatically set after installation.

2) Create your database and then set variables in .env file at root

3) Open command prompt or shell and change directory to your web root.
4) Then type
php artisan migrate
and press enter
This will create table structure to the database.
5) Then type
php artisan db:seed
It will seed data.

6) {{url}}/translate?src_language=english&word=This&trans_language=armenian
This is the end point for translation.

