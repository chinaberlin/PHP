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
        <table class="table">
    <tr>
        <th><?php echo L('id');?></th>
        <th><?php echo L('username');?></th>
        <th><?php echo L('email');?></th>
        <th><?php echo L('reg_date');?></th>
        <th><?php echo L('reg_ip');?></th>
    </tr>
    <?php if(is_array($users)): foreach($users as $key=>$user): ?><tr>
            <td><?php echo ($user["id"]); ?></td>
            <td><?php echo ($user["username"]); ?></td>
            <td><?php echo ($user["email"]); ?></td>
            <td><?php echo ($user["reg_date"]); ?></td>
            <td><?php echo ($user["reg_ip"]); ?></td>
        </tr><?php endforeach; endif; ?>
</table>
    </div>

</body>
</html>