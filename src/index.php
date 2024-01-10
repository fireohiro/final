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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').bxSlider({
                auto: true,
                pause: 4000,
            });
        });
    </script>

</head>
<body>
    <font size="7" color="#ff8c00" face="丸ゴシック">観光名所</font><hr>
    <form action="search.php" method="post">
        <input text-align:center type="text" name="key" placeholder="キーワード検索" style=" width:400px;height:20px;font-size:1.3em;">
        <button text-align:center type="submit">検索</button>
    </form>
    <?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->query('select * from spot');
    echo '<div class="slider">';
    foreach($sql as $row){
        echo '<img src="',$row['viewgazou'],'" width="1400" height="300" alt="観光地画像">';
    }
    echo '</div>';
    ?>
    <h4>[観光地一覧]</h4>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['delete'])) {
                $ddd=$pdo->prepare('delete from spot where s_id = ?');
                $ddd->execute([$_GET['sid']]);
            } 
        }
        echo '<table>';
        echo '<tr><th>観光名</th><th>所在地域</th><th></th><th></th></tr>';
        $spl=$pdo->query('select * from spot');
        foreach($spl as $saw){
            $ssl=$pdo->prepare('select * from area where a_id = ?');
            $ssl->execute([$saw['a_id']]);
            foreach($saw as $waw){

            }
        }
        foreach($sql as $row){
            $id=$row['id'];
            echo '<tr>';
            echo '<td>',$saw['s_mei'],'</td>';
            echo '<td>',$row['name'],'</td>';
            echo '<td>',$row['price'],'</td>';
            echo '<td><button onclick="location.href=\'update.php?id=' . $saw['s_id'] . '\'">更新</button></td>';
            echo '<td><form method="POST"><input type="hidden" name="sid" value="',$saw['s_id'],'><button type="submit" name="delete">削除</button></td>';
            echo '</tr>';
        }
        echo '</table>';
    ?>
    
</body>
</html>