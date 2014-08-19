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
        <style>
    .btn-default{
        margin:5px 10px;
    }
</style>
<div class="col-sm-12">
    <div class="col-sm-12">
        <div class="col-sm-1">
            <a href="<?php echo U('index',array_merge(I('get.'),['yx'=>'']));?>" class="<?php if(!I('get.yx')): ?>active<?php endif; ?> btn btn-default">全部月薪</a>
        </div>
        <div class="col-sm-11">
            <?php if(is_array($yxSelect)): foreach($yxSelect as $key=>$name): ?><a href="<?php echo U('index',array_merge(I('get.'),['yx'=>$name]));?>" class="<?php if(I('get.yx') === $name): ?>active<?php endif; ?> btn btn-default"><?php echo ($name); ?></a><?php endforeach; endif; ?>
        </div>
    </div>

    <div class="col-sm-12">
    <div class="col-sm-1">
            <a href="" class="btn btn-default">全部经验</a>
        </div>
        <div class="col-sm-11">
            <?php if(is_array($jySelect)): foreach($jySelect as $key=>$jy): ?><a href="<?php echo U('index',array_merge(I('get.'),['jy'=>$jy['name']]));?>" class="<?php if(I('get.jy') === $jy['name']): ?>active<?php endif; ?> btn btn-default"><?php echo ($jy["name"]); ?></a><?php endforeach; endif; ?>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-1">
            <a href="" class="btn btn-default">全部地点</a>
        </div>
        <div class="col-sm-11">
            <?php if(is_array($ddSelect)): foreach($ddSelect as $key=>$dd): ?><a href="<?php echo U('index',array_merge(I('get.'),['dd'=>$dd['name']]));?>" class="<?php if(I('get.dd') === $dd['name']): ?>active<?php endif; ?> btn btn-default"><?php echo ($dd["name"]); ?></a><?php endforeach; endif; ?>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-1">
            <a href="" class="btn btn-default">全部学历</a>
        </div>
        <div class="col-sm-11">
            <?php if(is_array($xlSelect)): foreach($xlSelect as $key=>$xl): ?><a href="<?php echo U('index',array_merge(I('get.'),['xl'=>$xl['name']]));?>" class="<?php if(I('get.xl') === $xl['name']): ?>active<?php endif; ?> btn btn-default"><?php echo ($xl["name"]); ?></a><?php endforeach; endif; ?>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-1">
            <a href="" class="btn btn-default">全部性质</a>
        </div>
        <div class="col-sm-11">
            <?php if(is_array($xzSelect)): foreach($xzSelect as $key=>$xz): ?><a href="<?php echo U('index',array_merge(I('get.'),['xz'=>$xz['name']]));?>" class="<?php if(I('get.xz') === $xz['name']): ?>active<?php endif; ?> btn btn-default"><?php echo ($xz["name"]); ?></a><?php endforeach; endif; ?>
        </div>
    </div>
    <!--<div class="col-sm-12">-->
        <!--<div class="col-sm-1">-->
            <!--<a href="" class="btn btn-default">全部公司</a>-->
        <!--</div>-->
        <!--<div class="col-sm-11">-->
            <!--<?php if(is_array($gsSelect)): foreach($gsSelect as $key=>$gs): ?>-->
                <!--<a href="" class="btn btn-default"><?php echo ($gs["name"]); ?></a>-->
            <!--<?php endforeach; endif; ?>-->
        <!--</div>-->
    <!--</div>-->
</div>


<table class="table">

    <tr>
        <th>编号</th>
        <th>标题</th>
        <th>地点</th>
        <th>经验</th>
        <th>学历</th>
        <th>公司</th>
        <th>性质</th>
        <th>月薪</th>
    </tr>

    <?php if(is_array($data)): foreach($data as $key=>$zp): ?><tr>
        <td><?php echo ($zp["id"]); ?></td>
        <td><?php echo ($zp["title"]); ?></td>
        <td><?php echo ($zp["dd"]["name"]); ?></td>
        <td><?php echo ($zp["jy"]["name"]); ?></td>
        <td><?php echo ($zp["xl"]["name"]); ?></td>
        <td><?php echo ($zp["gs"]["name"]); ?></td>
        <td><?php echo ($zp["xz"]["name"]); ?></td>
        <td><?php echo ($zp["yx"]["l"]); ?>k - <?php echo ($zp["yx"]["h"]); ?>k</td>
    </tr><?php endforeach; endif; ?>
</table>
    </div>
</body>
</html>