<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1517450-final';
    const USER = 'LAA1517450';
    const PASS = 'Pass0423';

    $connect = 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
</head>
<body>
    <font size="7" color="#ff8c00" face="丸ゴシック">観光名所</font><hr>
    <form action="search.php" method="post">
        <input text-align:center type="text" name="key" placeholder="キーワード検索" style=" width:400px;height:20px;font-size:1.3em;"><br>
        <button text-align:center type="submit">検索</button>
    </form>
    
</body>
</html>