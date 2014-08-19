<?php
/**
 * Kittencup Module
 *
 * @date 14-6-30 下午1:04
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace Job\Model;

use Think\Model\RelationModel;

class ZpModel extends RelationModel
{
    protected $tableName = 'job-zp';

    protected $_link = [
        'dd'=>[
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'job-dd',
            'foreign_key' => 'dd_id',
        ],
        'gs'=>[
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'job-gs',
            'foreign_key' => 'gs_id',
        ],
        'jy'=>[
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'job-jy',
            'foreign_key' => 'jy_id',
        ],
        'xl'=>[
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'job-xl',
            'foreign_key' => 'xl_id',
        ],
        'xz'=>[
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'job-xz',
            'foreign_key' => 'xz_id',
        ],
        'yx'=>[
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'job-yx',
            'foreign_key' => 'yx_id',
        ],

    ];



}