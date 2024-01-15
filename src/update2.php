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
    <title>更新完了画面</title>
</head>
<body>
    <h1>登録情報変更完了</h1><hr>
    <p>登録の解除が完了しました。</p>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('update spot set s_mei = ? , category = ? , gazou = ? , a_id = ? , viewgazou = ? where s_id = ?');
        $sql->execute([$_POST['s_mei'],$_POST['category'],$_POST['gazou'],$_POST['fruit'],$_POST['viewgazou'],$_POST['s_id']]);
        $sql=$pdo->prepare('select * from spot where s_id = ?');
        $sql->execute([$_POST['s_id']]);
        foreach($sql as $row){
            echo '<dl>';
            echo '<dt>観光地名</dt>';
            echo '<dd>',$row['s_mei'],'</dd>';
            echo '<dt>カテゴリー</dt>';
            echo '<dd>',$row['category'],'</dd>';
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
    <a href="index.php">トップページに戻る</a>
</body>
</html>