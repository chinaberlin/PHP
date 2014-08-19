<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-6
 * Time: 下午1:45
 */

namespace KpBlog\InputFilter;

use Zend\InputFilter\InputFilter;

class PostsBaseInputFilter extends InputFilter
{

    public function init(){

        $this->add([
            'name' => 'id',
            'filters' => [
                [
                    'name' => 'Int'
                ],
            ],
        ]);

        $this->add([
            'name' => 'title',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 5,
                        'max' => 85,
                    ]
                ],
            ],
        ]);

        $this->add([
            'name' => 'content',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ]
        ]);

        $this->add([
            'name' => 'addtime',
            'required' => true,
            'filters' => [
                [
                    'name' => 'Callback',
                    'options'=>[
                        'callback'=>'strtotime'
                    ]
                ]
            ]
        ]);

    }

}