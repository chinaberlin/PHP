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
    echo Head::script(['Vendor/jquery/jquery.2.1.0.min','Vendor/bootstrap3/dist/js/bootstrap.min','Public/index']);
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



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="directoryList modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</body>
</html>