<?php
namespace Kp;

include 'Kp/Autoloader.php';
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <?php
    echo Head::style(['Vendor/bootstrap3/dist/css/bootstrap.min', 'Public/index']);
    echo Head::script(['Vendor/jquery/jquery.2.1.0.min','Public/index']);
    ?>
</head>
<body>

<div class="container">

    <?php
    $type = Request::getQuery('type');
    if ($type === null || $type !== 'file') {
        include 'nav.php';
        include 'list.php';
    } else {
        include 'file.php';
    }
    ?>
</div>

</body>
</html>