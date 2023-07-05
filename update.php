<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    $request_id = filter_input(INPUT_POST, 'id');
    $request_name = filter_input(INPUT_POST, 'name');
    $request_age = filter_input(INPUT_POST, 'age');
    $request_gender = filter_input(INPUT_POST, 'gender');
    $dsn = 'mysql:dbname=php_practice;host=localhost;';
    $user = 'testuser';
    $password = 'sa';

    try{
        $dbh = new PDO($dsn, $user, $password);
        $dbh->query('SET NAMES utf8');
        
        $stmt = $dbh->prepare("UPDATE users SET id = :id, name = :name, age = :age, gender = :gender  where id = :id ");
        $stmt->bindValue("id",$request_id);
        $stmt->bindValue("name",$request_name);
        $stmt->bindValue("age",$request_age);
        $stmt->bindValue("gender",$request_gender);
        $stmt->execute();
        $result = $stmt->fetch();
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
    
    $dbh = null;
    header('Location: http://localhost/php_practice/');
    exit();

    ?>
</head>
<body>
    <!-- <form action="">
        ユーザ編集</br>
        <label for="id">ID</label></br>
        <label for=""><?php echo $id; ?></label></br>
        <label> 名前： </label></br>
        <input type="text" name="name" value="<?php echo $result['name']; ?>"></br>
        <label>年齢： </label></br>
        <input type="text" name="age" value="<?php echo $result['age']; ?>"></br>
        <label>性別：  </label></br>
        <input type="text" name="gender" value="<?php echo $result['gender']; ?>"></br>
        <button>編集</button></br>
    </form> -->
</body>
</html>