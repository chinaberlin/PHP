<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-6
 * Time: 下午2:50
 */

namespace Album\Form;

use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;

class AlbumInputFilter extends InputFilter
{


    public function __construct()
    {

        # id
        $this->add([
            'name' => 'id',
            'filters' => [
                [
                    'name' => 'Int'
                ],
            ],
        ]);

        $this->add([
            'name' => 'artist',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StripTags'
                ],
                [
                    'name' => 'StringTrim'
                ]
            ]
        ]);

        $this->add([
            'name' => 'title',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StripTags'
                ],
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 5,
                        'max' => 10,
                        'messages'=>[
                            StringLength::TOO_SHORT=>'输入字符个数应大于%min%',
                            StringLength::TOO_LONG=>'输入字符个数应小于%max%'
                        ]
                    ]
                ],
            ],

        ]);

    }


}