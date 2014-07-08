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
        <a href="<?php echo U('add');?>" class="btn btn-danger">add</a>

<table class="table">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>depth</th>
        <th>&nbsp;</th>
    </tr>
    <?php if(is_array($treeData)): foreach($treeData as $key=>$node): ?><tr>
            <td><?php echo ($node["id"]); ?></td>
            <td><?php echo str_repeat('　',$node['depth'] - 1); echo ($node["name"]); ?></td>
            <td><?php echo ($node["depth"]); ?></td>
            <td><a href="<?php echo U('edit',['id'=>$node['id']]);?>" class="btn btn-primary">edit</a></td>
        </tr><?php endforeach; endif; ?>
</table>


<select>
    <?php if(is_array($treeData)): foreach($treeData as $key=>$node): ?><option value=""><?php echo str_repeat('　',$node['depth']); echo ($node["name"]); ?></option><?php endforeach; endif; ?>
</select>
    </div>
</body>
</html>