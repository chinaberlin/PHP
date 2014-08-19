<?php

/**
 * Class Form
 * 将数据填充到每个element里去
 */
class Form extends FiledSet
{

    public function bind($data)
    {

        if (!is_array($data)) {
            exit('data 必须是数组');
        }

        foreach ($this->elements as $element) {

            $name = $element->getName();

            if (array_key_exists($name, $data)) {
                $element->setValue($data[$name]);
            }

        }

    }

    public function openForm()
    {
        return '<form ' . $this->exchangeAttributes() . '>';
    }

    public function render()
    {
        $html = '';
        foreach ($this->elements as $element) {
            $html .= $element->render();
        }
        return $html;
    }

    public function closeForm()
    {
        return '</form>';
    }
}