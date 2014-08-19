<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-6
 * Time: 下午1:45
 */

namespace Album\Form;

use Album\Model\Album;
use Zend\Form\Form;

class AlbumForm extends Form
{

    public function __construct()
    {

        parent::__construct();

        $this->setObject(new Album());
        $this->setInputFilter(new AlbumInputFilter());

        # id
        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);

        # artist
        $this->add([
            'name' => 'artist',
            'type' => 'Text',
            'options' => [
                'label' => 'Artist',
            ],
        ]);

        # title
        $this->add([
            'name' => 'title',
            'type' => 'Text',
            'options' => [
                'label' => 'Title',
            ],
        ]);

        # title
        $this->add([
            'name' => 'save',
            'type' => 'button',
            'attributes' => [
                'type' => 'submit'
            ],
            'options' => [
                'label' => 'save',
            ],
        ]);
    }

}