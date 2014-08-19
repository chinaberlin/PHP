<?php

namespace KpBootstrap3\Form\View\Helper;

use Zend\Form\FieldsetInterface;
use Zend\Form\FormInterface;
use Zend\Form\View\Helper\Form;

class Bootstrap3Form extends Form
{

    protected $formClassAllow = [
        'form-horizontal',
        'form-inline',
        'form'
    ];

    protected $defaultFormClass = 'form-horizontal';

    public function setFormClass(FormInterface $form)
    {
        $class = $form->getAttribute('class');

        $classList = explode(' ', $class);

        $classIntersect = array_intersect($classList, $this->formClassAllow);

        if (empty($classIntersect)) {
            $classList[] = $this->defaultFormClass;
            $classIntersect[] = $this->defaultFormClass;
        }

        $form->setAttribute('class', implode(' ', $classList));

        return array_pop($classIntersect);
    }

    public function render(FormInterface $form)
    {
        if (method_exists($form, 'prepare')) {
            $form->prepare();
        }

        $formClass = $this->setFormClass($form);

        $formContent = '';
        foreach ($form as $element) {

            $element->setOption('formClass', $formClass);

            if ($element instanceof FieldsetInterface) {
                $formContent .= $this->getView()->formCollection($element);
            } else {
                $formContent .= $this->getView()->KpBootstrap3FormRow($element);
            }
        }

        return $this->openTag($form) . $formContent . $this->closeTag();
    }
}