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
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\Stdlib\Hydrator\ClassMethods;

class PostsBaseForm extends Form implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    protected $serviceManager;
    protected $inputFilterManager;

    public function init()
    {
        parent::init();

        $this->serviceManager = $this->serviceLocator->getServiceLocator();

        $this->inputFilterManager = $this->serviceManager->get('inputFilterManager');
        $this->setInputFilter($this->inputFilterManager->get('KpBlog/InputFilter/PostsBase'));

        $this->setHydrator(new ClassMethods());
        $this->setObject(new PostsEntity());

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);

        $this->add([
            'name' => 'category_id',
            'type' => 'select',
            'options' => [
                'label' => 'category_id',
                'value_options' =>  $this->serviceManager->get('KpBlog\Table\Category')->getCategorySelectOptions(),

            ],
        ]);

        $this->add([
            'name' => 'title',
            'type' => 'Text',
            'options' => [
                'label' => 'title',
            ],
        ]);

        $this->add([
            'name' => 'content',
            'type' => 'Textarea',
            'options' => [
                'label' => 'Content',
            ],
        ]);

        $this->add([
            'name' => 'addtime',
            'type' => 'Text',
            'options' => [
                'label' => 'Addtime',
            ],
        ]);

        $this->add([
            'name' => 'status',
            'type' => 'select',
            'options' => [
                'label' => 'status',
                'value_options' => PostsModel::getStatus()
            ],
        ]);

        $this->add([
            'name' => 'type',
            'type' => 'select',
            'options' => [
                'label' => 'type',
                'value_options' => PostsModel::getType()
            ],
        ]);

    }

}