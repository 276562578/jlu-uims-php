<html>
<head>
    <title>保研统计系统----Powered by 张翼</title>
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
<BODY bgcolor=#4a93e9>
<script>

    alert("1.程序所收集的数据仅用来做成绩查询以及数据分析\n\n" +
        "2.使用本网站程序即认定公示自己的成绩排名\n\n" +
        "3.可能存在极其微弱的密码泄露风险，网站会做好一切可能的防护措施\n\n" +
        "4.累计至今的计入结算的科目共53门，对于不足53门的可能存在一定的错误\n\n" +
        "5.本网站及程序仅接受表扬、报错，不接受批评：）\n\n" +
        "6.凡使用本网站及程序，必须认定魏老师很漂亮以及苑书记很帅的事实\n\n")
</script>
<?php
include 'head.html';
$number=$_POST["number"];
$passwd=$_POST["passwd"];
$db = new SQLite3('ranking.db');
$result_number = $db->querySingle("select number from account where number=$number");
if($result_number){
    header("location:ranking.php?number=$number&passwd=$passwd");
}
elseif(strlen($number)==8){
    header("location:login.php?number=$number&passwd=$passwd");
}


?>

<center>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="margin:3% 0 0 ;">
        <table summary="" align="center">
            <tr>
                <td colspan="2"><h4>请输入uims的账号及密码</h4></td>
            </tr>
            <tr>
                <td>学号：</td>
                <td><input type="text" name="number" value='7012' maxlength="20"></td>
            </tr>
            <tr>
                <td><p></td>
            </tr>
            <tr>
                <td colspan="2"><h4>为防止输入错误，密码为明文，请注意！</h4></td>
            </tr>
            <tr>
                <td>密码：</td>
                <td><input type="text" name="passwd" value='' maxlength="20"></td>
            </tr>
            <tr>
                <td><p></td>
            </tr>
            <tr>
                <td><p></td>
            </tr>
            <tr align=center>
                <td colspan="2"><input type="submit" value="提 交"/></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>
