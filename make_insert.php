<?php
    require 'users.php';
   // insert into users values (2, '一郎', 23, '男');
   $random_num = mt_rand(10, 99);
   $random_gender = mt_rand(0, 2);
    for ($i=1; $i <= 1000; $i++) { 
        echo "INSERT INTO users values ({$i}, '{$user_name[$i-1]}', {$random_num}, '{$gender[$random_gender]}'); ";
        echo "\r\n";
    }
?>