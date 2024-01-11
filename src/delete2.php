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
    <title>削除完了画面</title>
</head>
<body>
    <h1>解除完了</h1><hr>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('delete from spot where s_id = ?');
        $sql->execute([$_POST['s_id']]);
    ?>
    <p>登録の解除が完了しました。</p>
    <a href="index.php">トップページに戻る</a>
</body>
</html>