<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    $id = filter_input(INPUT_GET, 'id');
    $dsn = 'mysql:dbname=php_practice;host=localhost;';
    $user = 'testuser';
    $password = 'sa';

    try{
        $dbh = new PDO($dsn, $user, $password);
        $dbh->query('SET NAMES utf8');
        $stmt = $dbh->prepare("select * from users where id = :id ");
        $stmt->bindValue("id",$id);
        $stmt->execute();
        $result = $stmt->fetch();
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
    
    $dbh = null;

    ?>
</head>
<body>
    <form action="update.php" method="POST">
        ユーザ編集</br>
        <label for="id">ID</label></br>
        <label for=""><?php echo $id; ?></label></br>
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
        <label> 名前： </label></br>
        <input type="text" name="name" value="<?php echo $result['name']; ?>"></br>
        <label>年齢： </label></br>
        <input type="text" name="age" value="<?php echo $result['age']; ?>"></br>
        <label>性別：  </label></br>
        <input type="text" name="gender" value="<?php echo $result['gender']; ?>"></br>
        <button>編集</button></br>
    </form>
</body>
</html>