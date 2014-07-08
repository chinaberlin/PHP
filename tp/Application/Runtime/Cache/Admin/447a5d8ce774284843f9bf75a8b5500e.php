<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thinkphp</title>
    <link rel="stylesheet" type="text/css" href="/Public/Vendor/Bootstrap3/css/bootstrap.min.css" />
    <script type="text/javascript" src="/Public/Vendor/jquery/jquery/jquery.min.js"></script><script type="text/javascript" src="/Public/Vendor/Bootstrap3/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <form action="" method="post" class="form-horizontal">

    <div class="form-group">

        <div class="form-group">
            <button type="submit" class="btn btn-default" name="isDelete" value="1"><?php echo L('confirm_delete');?></button>
            <button type="submit" class="btn btn-default" name="isDelete" value="-1"><?php echo L('return_index');?></button>
        </div>

    </div>

</form>
    </div>
</body>
</html>