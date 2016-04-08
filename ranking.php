<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="format-detection" content="telephone=no"/>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>
<div style="text-align: center;">
    <?php
    include 'head.html';
    $number = $_GET["number"];
    $passwd = $_GET["passwd"];
    $db = new SQLite3('ranking.db');
    $result_passwd = $db->querySingle("select passwd from account where number=$number");

    function printRanking($db, $number)
    {
        $ranking = $db->querySingle("select (select count(*)+1 from ranking where a.averScore<averScore)as rank from ranking a where a.number=$number");
        $count = $db->querySingle("select count(*) from ranking");
        $username=$db->querySingle("select username from ranking where number=$number");
        $averScore=$db->querySingle("select averScore from ranking where number=$number");

        echo "<p>";
        echo "姓名：";
        echo $username;
        echo "</p><p>";
        echo "平均分：";
        echo $averScore;
        echo "</p><p>";
        echo "你的排名是：";
        echo $ranking;
        echo "</p><p>";
        echo "总统计人数：";
        echo $count;
    }

    if ($result_passwd != $passwd) {
        echo "<h3 align='center'>密码错误</h3>";
    } else {
        printRanking($db, $number);
    }


    ?>
<p>
<p>
</div>
</body>
</html>

