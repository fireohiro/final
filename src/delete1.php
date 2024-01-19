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
    <title>削除画面</title>
    <link rel="stylesheet" href="css/delete.css">
</head>
<body>
    <h1>登録解除</h1><hr>
    <p>以下の情報を削除します。よろしいでしょうか？</p>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from spot where s_id = ?');
        $sql->execute([$_GET['id']]);
        foreach($sql as $row){
            echo '<dl>';
            echo '<dt>観光地名</dt>';
            echo '<dd>',$row['s_mei'],'</dd>';
            echo '<dt>画像URL<dt>';
            echo '<dd>',$row['gazou'],'</dd>';
            echo '<dt>ホームページ画像URL<dt>';
            echo '<dd>',$row['viewgazou'],'</dd>';
            $ssl=$pdo->prepare('select * from area where a_id = ?');
            $ssl->execute([$row['a_id']]);
            foreach($ssl as $pow){
                echo '<dt>所在地域</dt>';
                echo '<dd>',$pow['a_mei'],'</dd>';
            }
            echo '</dl>';
        }
    ?>
    <form action="delete2.php" method="POST">
        <input type="hidden" name="s_id"  value="<?= $_GET['id'] ?>">
        <button style="padding-right: 15px;text-align: center; float:right;" type="submit">削除する</button>
    </form><span><button style="padding-right: 15px;text-align: center; float:right;" onclick="location.href='./index.php'">キャンセル</button></span>
</body>
</html>