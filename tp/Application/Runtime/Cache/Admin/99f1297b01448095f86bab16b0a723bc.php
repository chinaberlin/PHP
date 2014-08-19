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

    <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>"/>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo L('username');?></label>

        <div class="col-sm-10">
            <input type="text" name="_username" value="<?php echo ($user["username"]); ?>" disabled class="form-control" placeholder="<?php echo L('username');?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo L('password');?></label>

        <div class="col-sm-10">
            <input type="password" name="_password" class="form-control" placeholder="<?php echo L('password');?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo L('password_confirm');?></label>

        <div class="col-sm-10">
            <input type="text" name="_password_confirm" class="form-control" placeholder="<?php echo L('password_confirm');?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo L('email');?></label>

        <div class="col-sm-10">
            <input type="email" name="_email" value="<?php echo ($user["email"]); ?>" class="form-control" placeholder="<?php echo L('email');?>">
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php echo L('save');?></button>
        </div>
    </div>
</form>
    </div>
</body>
</html>