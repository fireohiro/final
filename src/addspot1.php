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
    <title>新規登録画面</title>
</head>
<body>
    <h1>新規登録</h1><hr>
    <p style="background-color: orange; text-align: center; color: white;">追加する情報を追加してください</p>
    <form action="addspot2.php" method="POST" enctype="multipart/form-data">
        <dl>
            <dt>観光地名称　　（必須）</dt>
            <dd><input type="text" name="name" size="25" required="required"></dd>
            <dt>カテゴリ　　（必須）</dt>
            <dd><input type="text" name="type" size="25" required="required"></dd>
            <dt>画像を選択してください（任意）</dt>
            <dd><input type="text" name="file" placeholder="画像名を入力"></dd>
            <dt>ホーム画面用画像（任意）</dt>
            <dd><input type="text" name="file1" placeholder="画像名を入力"></dd>
        </dl>
            所在地方:
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $ssl=$pdo->query('select * from area');
                echo '<select name="fruit">';
                foreach($ssl as $pow){
                    echo '<option value="', $pow['a_id'],'">', $pow['a_mei'] , '</option>';
                }
                echo '</select>';
            ?><br><br>
        <button style="text-align: center; float:right;" onclick="location.href='./index.php'">キャンセル</button>
        <button style="text-align: center; float:right;" type="submit">追加する</button>
    </form>
</body>
</html>