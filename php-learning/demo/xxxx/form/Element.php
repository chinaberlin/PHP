<?php

/**
 * Class Element
 * 主要处理元素的属性和选项
 */
class Element implements ElementInterface, LabelInterface
{

    protected $label;
    protected $labelAttributes;
    protected $attributes;
    protected $type;
    protected $name;
    protected $value;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setOptions($options)
    {
        if (isset($options['label'])) {
            $this->setLabel($options['label']);
        }

        if (isset($options['labelAttributes'])) {
            $this->setLabelAttributes($options['labelAttributes']);
        }

    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function setAttribute($attr, $val)
    {
        $this->attributes[$attr] = $val;
        return $this;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }


    public function getAttribute($attr)
    {
        if (isset($this->attributes[$attr])) {
            return $this->attributes[$attr];
        }
        return null;
    }

    public function setLabelAttributes($attributes)
    {
        $this->labelAttributes = $attributes;
        return $this;
    }

    public function getLabelAttributes()
    {
        return $this->getLabelAttributes();
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function exchangeAttributes()
    {
        $attrs = [];

        foreach ($this->attributes as $attr => $value) {
            $attrs[] = $attr . '="' . $value . '"';
        }

        if (!empty($this->name)) {
            $attrs[] = 'name = "' . $this->name . '"';
        }

        if (!empty($this->value)) {
            $attrs[] = 'value="' . $this->value . '"';
        }
        return implode(' ', $attrs);

    }
}