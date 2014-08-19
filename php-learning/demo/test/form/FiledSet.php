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
            }


            $element = $this->getElementManager()->get($type);

            if (isset($elementOrElementOptions['name'])) {
                $element->setName($elementOrElementOptions['name']);
            } else {
                exit('....name 必须设置');
            }


            if (isset($elementOrElementOptions['options'])) {
                $element->setOptions($elementOrElementOptions['options']);
            }

            if (isset($elementOrElementOptions['attributes'])) {
                $element->setAttributes($elementOrElementOptions['attributes']);
            }

            $this->elements[] = $element;

        } else if ($elementOrElementOptions instanceof Element) {
            $this->elements[] = $elementOrElementOptions;
        }


        return $this;

    }

    public function getElementManager()
    {
        if ($this->elementManager === null) {
            $this->elementManager = new ElementManager();
        }
        return $this->elementManager;
    }

}