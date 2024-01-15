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
    <title>新規登録完了画面</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <h1>登録完了</h1><hr>
    <p>新しい観光地が追加されました。</p>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('INSERT INTO spot VALUES(null,?,?,?,?,?)');
    $sql->execute([$_POST['name'], $_POST['type'],$_POST['file'], $_POST['fruit'],$_POST['file1']]);

    // データの表示（例としてすべてのspotを表示）
    $sos = $pdo->query('SELECT * FROM spot');
    echo '<table>';
    echo '<tr><th>観光名</th><th>カテゴリー</th><th>画像URL</th><th>地域コード</th><th>ホーム用URL</th></tr>';
    foreach ($sos as $woa) {
        echo '<tr>';
        echo '<td>', $woa['s_mei'], '</td>';
        echo '<td>', $woa['category'], '</td>';
        echo '<td>', $woa['gazou'], '</td>';
        echo '<td>', $woa['a_id'], '</td>';
        echo '<td>', $woa['viewgazou'];
        echo '</tr>';
    }
    echo '</table>';
?>
    <button onclick="location.href='index.php'">トップページに戻る</button>
</body>
</html>