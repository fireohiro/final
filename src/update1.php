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
    <title>更新画面</title>
    <link rel="stylesheet" href="css/delete.css">
</head>
<body>
    <h1>登録情報変更</h1><hr>
    <p>以下の情報の変更内容を入力してください</p>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from spot where s_id = ?');
        $sql->execute([$_GET['id']]);
        echo '<form action="update2.php" method="POST">';
        foreach($sql as $row){
            echo '<dl>';
            echo '<dt>観光地名</dt>';
            echo '<dd><input type="text" name="s_mei" value="',$row['s_mei'],'"></dd>';
            echo '<dt>カテゴリー</dt>';
            echo '<dd><input type="text" name="category" value="',$row['category'],'"></dd>';
            echo '<dt>画像URL<dt>';
            echo '<dd><input type="text" name="gazou" value="',$row['gazou'],'"></dd>';
            echo '<dt>ホームページ画像URL<dt>';
            echo '<dd><input type="text" name="viewgazou" value="',$row['viewgazou'],'"></dd>';
            $ssl=$pdo->query('select * from area');
            echo '<select name="fruit">';
            foreach($ssl as $pow){
                echo '<option value="', $pow['a_id'],'">', $pow['a_mei'] , '</option>';
            }
            echo '</select>';
            echo '</dl>';
        }
        
        echo '<input type="hidden" name="s_id"  value="', $_GET['id'], '">';
        echo '<button type="submit">確定</button>';
        echo '</form>';
    ?>
    <span><button onclick="location.href=\'index.php\'">キャンセル</button></span>
</body>
</html>