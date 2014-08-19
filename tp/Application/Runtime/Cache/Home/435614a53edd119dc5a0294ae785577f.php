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
        <form class="form-inline" role="form">
    <div class="form-group">
        <label class="sr-only">Username</label>
        <input type="email" class="form-control" name="_username" placeholder="Username">
    </div>
    <div class="form-group">
        <label class="sr-only">Password</label>
        <input type="password" class="form-control" name="_password" placeholder="Password">
    </div>
    <div class="form-group">
        <label class="sr-only">verify</label>
        <img id="verify" src="<?php echo U('verify');?>"/>
        <input type="text" class="form-control" name="_verify" placeholder="Verify">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Remember me
        </label>
    </div>
    <button type="submit" class="btn btn-default">Register</button>
</form>

<script>

    document.getElementById('verify').onclick = function () {
        this.src = this.src;
    }

</script>
    </div>
</body>
</html>