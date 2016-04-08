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

    $command = "python uims.py $number $passwd";
    echo "<p><p>";
    passthru($command);
    passthru("python sqlite.py");
    echo "<p><p>";
    echo "<a href='ranking.php?number=$number&passwd=$passwd'>跳转到排名页面</a>";

    //sleep(3);
    //header("location:ranking.php?number=$number&passwd=$passwd");


    ?>


</div>


</body>
</html>
