<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

$dsn = 'mysql:dbname=php_practice;host=localhost;';
$user = 'testuser';
$password = 'sa';

try{
    $dbh = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');

    $dbh->query('SET NAMES utf8');

    $sql = 'select * from users';
    print("<table>");
    print("<tr>");
    print("<th style='border: solid 1px;'>");
    print("ID");
    print("</th>");
    print("<th style='border: solid 1px;'>");
    print("名前");
    print("</th>");
    print("</tr>");

    foreach ($dbh->query($sql) as $row) {
        print("<tr>");
        print("<td style='border: solid 1px;'>");
        print($row['id']);
        print("</td>");
        print("<td style='border: solid 1px;'>");
        print($row['name']);
        print("</td>");
        print("</tr>");        
    }
    print("</table>");

}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>
</head>
<body>
    
</body>
</html>