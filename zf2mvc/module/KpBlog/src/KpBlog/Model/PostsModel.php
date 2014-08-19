<?php
namespace KpBlog\Model;

use Zend\Filter\DateTimeFormatter;

class PostsModel
{

    public static function getStatus($key = null, $default = null)
    {
        $returnData = [
            '1' => 'normal',
            '100' => 'top'
        ];

        if ($key !== null) {

            if (array_key_exists($key, $returnData)) {
                return $returnData[$key];
            } else {
                return $default;
            }

        }
        return $returnData;
    }

    public static function getType($key = null, $default = null)
    {
        $returnData = [
            '1' => 'normal',
            '2' => 'video'
        ];

        if ($key !== null) {

            if (array_key_exists($key, $returnData)) {
                return $returnData[$key];
            } else {
                return $default;
            }

        }
        return $returnData;
    }
}