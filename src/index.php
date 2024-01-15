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
    <link rel="stylesheet" href="css/index.css"> 
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
<div class="tourist-attraction">観光名所</div>
<hr class="separator">
    <?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->query('select * from spot');
    echo '<div class="slider">';
    foreach($sql as $row){
        if(isset($row['viewgazou'])){
            echo '<img src="img/',$row['viewgazou'],'" width="1400" height="300" alt="観光地画像">';
        }
    }
    echo '</div>';
    ?>
    <hr>
    <h4>[観光地一覧]</h4>
    <?php
        echo '<button class="right-align" onclick="location.href=\'addspot1.php\'">観光地登録</button>';
        echo '<table>';
        echo '<tr><th>観光名</th>';
        echo '<form method="POST">';
        echo '<th>';
        echo '<button type="submit">カテゴリー</button>　';
        echo '<select name="cate">';
        echo '<option value="0">全て</option>';
        $owe=$pdo->query('select distinct category from spot');
        foreach($owe as $eie){
            echo '<option value="',$eie['category'],'">',$eie['category'],'</option>';
        }
        echo '</th>';
        echo '</form>';
        echo '<th>所在地域</th><th></th><th></th></tr>';
        if(!(isset($_POST['cate'])) || $_POST['cate'] == 0){
            $spl=$pdo->query('select * from spot');
        }else{
            $spl=$pdo->prepare('select * from spot where category = ?');
            $spl->execute([$_POST['cate']]);
        }
        foreach($spl as $saw){
            $ssl=$pdo->prepare('select * from area where a_id = ?');
            $ssl->execute([$saw['a_id']]);
            foreach($ssl as $waw){
                echo '<tr>';
                echo '<td>',$saw['s_mei'],'</td>';
                echo '<td>',$saw['category'],'</td>';
                echo '<td>',$waw['a_mei'],'</td>';
                echo '<td><button onclick="location.href=\'update1.php?id=' . $saw['s_id'] . '\'">更新</button></td>';
                echo '<td><button onclick="location.href=\'delete1.php?id=' . $saw['s_id'] . '\'">削除</button></td>';
                echo '</tr>';
            }
        }
        echo '</table>';
    ?>
    
</body>
</html>