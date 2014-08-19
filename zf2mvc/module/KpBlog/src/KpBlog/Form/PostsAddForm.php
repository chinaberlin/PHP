<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-6
 * Time: 下午1:45
 */

namespace KpBlog\Form;

use KpBlog\Entity\PostsEntity;
use KpBlog\Model\PostsModel;
use Zend\Form\Form;

class PostsAddForm extends PostsBaseForm
{
    public function init()
    {
        parent::init();

        $this->setInputFilter($this->inputFilterManager->get('KpBlog/InputFilter/PostsAdd'));

        $this->add([
            'name' => 'submit',
            'type' => 'button',
            'attributes' => [
                'type' => 'submit'
            ],
            'options' => [
                'label' => 'add',
            ],
        ]);

        $this->remove('id');

    }

}