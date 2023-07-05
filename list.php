<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

$dsn = 'mysql:dbname=uriage;host=localhost';
$user = 'testuser';
$password = 'testuser';

try{
    $dbh = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');

    $dbh->query('SET NAMES sjis');
//     <table border="1">
//     <tr>
//       <th>名前</th>
//       <th>年齢</th>
//     </tr>
//     <tr>
//       <td>田中</td>
//       <td>27</td>
//     </tr>
//     <tr>
//       <td>佐藤</td>
//       <td>42</td>
//     </tr>
//   </table>
    $sql = 'select * from shouhin';
    print("<table>");
    print("<tr>");
    print("<th>");
    print("ID");
    print("</th>");
    print("<th>");
    print("名前");
    print("</th>");
    print("</tr>");

    foreach ($dbh->query($sql) as $row) {
        print("<tr>");
        print("<td>");
        print($row['id']);
        print("</td>");
        print("<td>");
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