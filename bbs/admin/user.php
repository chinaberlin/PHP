<?php
include 'header.php';
?>

<?php


$filterData = [
    'status' => [
        'data' => getUserStatus(),
        'name' => 'status',
    ],
    'type' => [
        'data' => getUserType(),
        'name' => 'type'
    ],
    'regdate' => [
        'data' => 'date',
        'name' => 'reg date'
    ],
    'lastlogindate' => [
        'data' => 'date',
        'name' => 'last login date'
    ]
];


foreach ($filterData as $urlKey => $filter) {

    $queryParams = $_GET;

    if (array_key_exists($urlKey, $queryParams)) {
        unset($queryParams[$urlKey]);
    }

    $filterData[$urlKey]['url'] = 'user.php?' . http_build_query($queryParams);

}

//debug($filterData);
?>


    <div class="panel panel-default">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <?php foreach ($filterData as $key => $filter): ?>
                <div class="col-sm-12">
                    <a href="<?= $filter['url']; ?>" class="btn <?= isset($_GET[$key]) ? '' : 'btn-danger' ?>">
                        所有<?= __($filter['name']); ?>
                    </a>

                    <?php if ($filter['data'] === 'date'): ?>

                        <?php
                            $urlData = isset($_GET[$key]) ? $_GET[$key] : null;

                            if($urlData === null){
                                $startDate = $endDate = '';
                            }else{
                                list($startDate, $endDate) = explode('~', $urlData);
                            }
                        ?>
                        <input type="text" value="<?=$startDate;?>" class="startDate"/>
                        至
                        <input data-url-key="<?= $key; ?>" value="<?=$endDate;?>" type="text" class="endDate" <?=empty($endDate)?'disabled':''?>/>

                    <?php else: ?>
                        <?php foreach ($filter['data'] as $val => $name): ?>
                            <a href="<?= $filter['url'] . '&' . $key . '=' . $val; ?>"
                               class="btn <?= isset($_GET[$key]) && $_GET[$key] == $val ? 'btn-danger' : '' ?>">
                                <?= __($name); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        $('.endDate').datetimepicker({
            format: 'yyyy-mm-dd',
            language: 'zh-CN',
            autoclose: true,
            todayBtn: true,
            minView: 2
        }).on('changeDate', function (e) {

            var url = $(this).prev().prev().attr('href');

            var startDate = $(this).prev().val();
            var endDate = $(this).val();

            var urlKey = $(this).attr('data-url-key');

            location.href = url + '&' + urlKey + '=' + startDate + '~' + endDate;

        });

        $('.startDate').datetimepicker({
            format: 'yyyy-mm-dd',
            language: 'zh-CN',
            autoclose: true,
            todayBtn: true,
            minView: 2
        }).on('changeDate', function (e) {


            $(this).next().removeAttr('disabled').trigger('focus');

            var date = new Date(e.date.toString());

            date.setDate(date.getDate() + 1);

            $('.endDate').datetimepicker('setStartDate', date);
        });
    </script>


    <a href="userAction.php" class="btn btn-success"><?= __('add'); ?></a>

    <table class="table">
        <tr>
            <?= hrSort('id', 'id'); ?>
            <?= hrSort('username', 'username'); ?>
            <?= hrSort('regdate', 'reg date'); ?>
            <?= hrSort('regip', 'reg ip'); ?>
            <?= hrSort('lastlogindate', 'last login date'); ?>
            <?= hrSort('lastloginip', 'last login ip'); ?>
            <?= hrSort('orderType', 'type'); ?>
            <?= hrSort('status', 'status'); ?>
        </tr>

        <?php
        // 当前页数
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        // 每页显示条数
        $pageShowCount = 10;
        // 计算limit
        $limit = ($page - 1) * $pageShowCount;

        // 升序还是降序
        $order = isset($_GET['order']) ? $_GET['order'] : 'desc';
        $orderType = isset($_GET['orderType']) ? $_GET['orderType'] : 'id';


        $type = isset($_GET['type']) ? $_GET['type'] : null;

        $status = isset($_GET['status']) ? $_GET['status'] : null;

        $regDate = isset($_GET['regdate']) ? $_GET['regdate'] : null;
        $lastLoginDate = isset($_GET['lastlogindate']) ? $_GET['lastlogindate'] : null;

        //'where type = 1 and status = 1';

        $where = [];

        if ($type !== null) {
            $where[] = '`type` = ' . $type;
        }

        if ($status !== null) {
            $where[] = '`status` = ' . $status;
        }

        if ($regDate !== null) {
            list($startDate, $endDate) = explode('~', $regDate);
            $where[] = '`regdate` > ' . strtotime($startDate);
            $where[] = '`regdate` < ' . strtotime($endDate);
        }

        if ($lastLoginDate !== null) {
            list($startDate, $endDate) = explode('~', $lastLoginDate);
            $where[] = '`lastlogindate` > ' . strtotime($startDate);
            $where[] = '`lastlogindate` < ' . strtotime($endDate);
        }

        if (empty($where)) {
            $where = 1;
        } else {
            $where = implode(' and ', $where);
        }


        $sql = "SELECT * FROM `user` WHERE {$where} ORDER BY `{$orderType}` {$order} limit {$limit},$pageShowCount";

        echo $sql;
        ?>

        <?php foreach (fetchAll($sql) as $user): ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= date('y/m/d H:i', $user['regdate']); ?></td>
                <td><?= $user['regip']; ?></td>
                <td><?= date('y/m/d H:i', $user['lastlogindate']); ?></td>
                <td><?= $user['lastloginip']; ?></td>
                <td><?= __(getUserType($user['type'])); ?></td>
                <td><?= __(getUserStatus($user['status'])); ?></td>
            </tr>

        <?php endforeach; ?>


        <?php


        // 计算数据总数
        $userCount = fetchCount("SELECT * FROM `user` WHERE {$where}");



        ?>

    </table>

<?= showPage($userCount, $pageShowCount, $page); ?>



<?php
include 'footer.php';
?>