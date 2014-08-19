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
        <label class="col-sm-2 control-label"><?php echo L('parent_id');?></label>

        <div class="col-sm-10">
            <select name="toId">
                <?php if(is_array($treeData)): foreach($treeData as $key=>$node): ?><option value="<?php echo ($node["id"]); ?>"><?php echo str_repeat('　',$node['depth']); echo ($node["name"]); ?></option><?php endforeach; endif; ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo L('name');?></label>

        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" placeholder="<?php echo L('name');?>">
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php echo L('add');?></button>
        </div>
    </div>
</form>
    </div>
</body>
</html>