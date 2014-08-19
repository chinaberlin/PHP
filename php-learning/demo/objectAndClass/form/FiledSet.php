<?php

/**
 * Class FiledSet
 * 处理元素能添加子元素
 */
class FiledSet extends Element
{
<<<<<<< HEAD

=======
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
    protected $elements = [];
    protected $elementManager = null;
    protected $defaultType = 'text';

    public function addElement($elementOrElementOptions)
    {

        if (is_array($elementOrElementOptions)) {

            $type = $this->defaultType;

            if (isset($elementOrElementOptions['type'])) {
                $type = $elementOrElementOptions['type'];
<<<<<<< HEAD
            }


            $element = $this->getElementManager()->get($type);

            if (isset($elementOrElementOptions['name'])) {
                $element->setName($elementOrElementOptions['name']);
            } else {
                exit('....name 必须设置');
            }

=======
            }    //找到type所对应的值，例如text

            $element = $this->getElementManager()->get($type);
            //调用getElementManager方法，由于getElementManager方法里新建了一个ElementManager
            //对象，而ElementManager对象又有get()方法，所以调用get()方法
            //而ElementManager里的get()方法目的是：通过文字找到相对应的对象
            //找到相对应的对象后，（例如通过text找到Text.php），下面再对它进行options和attributes进行设置
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b

            if (isset($elementOrElementOptions['options'])) {
                $element->setOptions($elementOrElementOptions['options']);
            }

            if (isset($elementOrElementOptions['attributes'])) {
                $element->setAttributes($elementOrElementOptions['attributes']);
            }

            $this->elements[] = $element;
<<<<<<< HEAD

=======
            var_dump($element);
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
        } else if ($elementOrElementOptions instanceof Element) {
            $this->elements[] = $elementOrElementOptions;
        }

<<<<<<< HEAD

=======
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
        return $this;

    }

    public function getElementManager()
    {
        if ($this->elementManager === null) {
<<<<<<< HEAD
            $this->elementManager = new ElementManager();
=======
            $this->elementManager = new ElementManager();// 新建一个ElementManager对象
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
        }
        return $this->elementManager;
    }

}