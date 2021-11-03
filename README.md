<strong>Installation Tutorial</strong>

Pertama, persiapan instalasi
1. buat database baru di phpmyadmin bernama db_stohealth <br>
2. install git for windows https://git-scm.com/download/win (skip kalo udah) <br>
3. install composer for windows https://getcomposer.org/Composer-Setup.exe (skip kalo udah) <br>
4. buat folder baru di folder htdocs Xampp, buka foldernya, klik kanan sembarang tempat, pilih Git Bash

<br>
kedua, dilanjutkan menggunakan Git Bash: (tinggal copas) <br>
1. git remote add origin https://github.com/Alimk23/stohealth <br>
2. git pull origin master <br>
3. php artisan migrate <br>
4. php artisan db:seed <br>
5. composer update <br>
6. php artisan serve <br>
<br>
Terakhir, buka url http://localhost:8000/ di browser
