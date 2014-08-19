<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php if(is_array($users)): foreach($users as $key=>$user): ?><p><?php echo ($user["username"]); ?></p><?php endforeach; endif; ?>
</body>
</html>