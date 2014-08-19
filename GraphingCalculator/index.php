<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>圆形计算</title>
</head>
<body>
    <center>
        <h1>圆形（周长&面积）计算器</h1>
        <a href="index.php?action=rect">矩形</a>
        <a href="index.php?action=triangle">三角形</a>
        <a href="index.php?action=circle">圆形</a>
        <hr>
    </center>
    <?php
        error_reporting(E_ALL & ~E_NOTICE);
        function __autoload($classname){
            include strtolower($classname).".class.php";
        }
        echo new Form("index.php");
        if(isset($_POST["sub"])){
            echo new Result();
        }
    ?>
</body>
</html>

