<?php
     $id = filter_input(INPUT_GET, 'id');
     $dsn = 'mysql:dbname=php_practice;host=localhost;';
     $user = 'testuser';
     $password = 'sa';
 
     try{
         $dbh = new PDO($dsn, $user, $password);
         $dbh->query('SET NAMES utf8');
         $stmt = $dbh->prepare("DELETE FROM users WHERE id = :id ");
         $stmt->bindValue("id",$id);
         $stmt->execute();
     }catch (PDOException $e){
         print('Error:'.$e->getMessage());
         die();
     }
     
     $dbh = null;
     header('Location: http://localhost/php_practice/');
     exit();
?>