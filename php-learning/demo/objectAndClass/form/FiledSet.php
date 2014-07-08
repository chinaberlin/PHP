<?php

/**
 * Class FiledSet
 * 处理元素能添加子元素
 */
class FiledSet extends Element
{
    protected $elements = [];
    protected $elementManager = null;
    protected $defaultType = 'text';

    public function addElement($elementOrElementOptions)
    {

        if (is_array($elementOrElementOptions)) {

            $type = $this->defaultType;

            if (isset($elementOrElementOptions['type'])) {
                $type = $elementOrElementOptions['type'];
            }    //找到type所对应的值，例如text

            $element = $this->getElementManager()->get($type);
            //调用getElementManager方法，由于getElementManager方法里新建了一个ElementManager
            //对象，而ElementManager对象又有get()方法，所以调用get()方法
            //而ElementManager里的get()方法目的是：通过文字找到相对应的对象
            //找到相对应的对象后，（例如通过text找到Text.php），下面再对它进行options和attributes进行设置

            if (isset($elementOrElementOptions['options'])) {
                $element->setOptions($elementOrElementOptions['options']);
            }

            if (isset($elementOrElementOptions['attributes'])) {
                $element->setAttributes($elementOrElementOptions['attributes']);
            }

            $this->elements[] = $element;
            var_dump($element);
        } else if ($elementOrElementOptions instanceof Element) {
            $this->elements[] = $elementOrElementOptions;
        }

        return $this;

    }

    public function getElementManager()
    {
        if ($this->elementManager === null) {
            $this->elementManager = new ElementManager();// 新建一个ElementManager对象
        }
        return $this->elementManager;
    }

}