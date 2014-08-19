<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-6
 * Time: 下午1:25
 */

namespace KpTest\Model\TestTable;

use KpTree\Model\NestedTable;

class TestTable extends NestedTable{

    // 设置数据库名
    protected $table = 'nested';

    // 设定左 字段
    protected $lColumn = 'l';

    // 设定右字段
    protected $rColumn = 'r';
}

