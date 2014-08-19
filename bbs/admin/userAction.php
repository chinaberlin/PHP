<?php
include 'header.php';
?>

<form class="form-horizontal">

    <div class="form-group">
        <label class="col-sm-2 control-label"><?= __('Username'); ?></label>

        <div class="col-sm-10">
            <input type="username" name="username" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?= __('Password'); ?></label>

        <div class="col-sm-10">
            <input type="password" name="password" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?= __('Email'); ?></label>

        <div class="col-sm-10">
            <input type="email" name="email" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?= __('Reg Date'); ?></label>

        <div class="col-sm-10">
            <input type="text" name="regdate" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?= __('Reg Ip'); ?></label>

        <div class="col-sm-10">
            <input type="text" name="regip" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?= __('Last Login date'); ?></label>

        <div class="col-sm-10">
            <input type="text" name="lastlogindate" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?= __('Last Login Ip'); ?></label>

        <div class="col-sm-10">
            <input type="text" name="lastloginip" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?= __('Type'); ?></label>

        <div class="col-sm-10">
            <select class="form-control" name="type">
                <?php
                foreach (getUserType() as $key => $type):
                    ?>
                    <option value="<?= $key; ?>"><?= __($type); ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?= __('Status'); ?></label>

        <div class="col-sm-10">
            <select class="form-control" name="status">
                <?php
                foreach (getUserStatus() as $key => $type):
                    ?>
                    <option value="<?= $key; ?>"><?= __($type); ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?= __('add') ?></button>
        </div>
    </div>
</form>

<script>

    $('input[name=regdate],input[name=lastlogindate]').datetimepicker({
        format: 'yyyy-mm-dd hh:ii:ss',
        language: 'zh-CN',
        autoclose: true,
        todayBtn: true
    });

</script>

<?php
include 'footer.php';
?>
