<?php

namespace KpBootstrap3\Form\View\Helper;


use Zend\Form\Element\Button;
use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormRow;

class Bootstrap3FormRow extends FormRow
{

    protected $formWrap = '<div class="form-group">%s%s</div>';
    protected $horizontalElementWrap = '<div class="%s">%s</div>';
    protected $horizontalDefaultLabelGridClass = 'col-sm-2';
    protected $grid = 12;

    protected static $labelClassName = null;

    public function render(ElementInterface $element)
    {
        $labelHelper = $this->getLabelHelper();
        $elementHelper = $this->getElementHelper();

        $formClass = $element->getOption('formClass');

        $label = $element->getLabel();
        $inlineBlockTxt = '';
        $labelHtml = '';
        $labelClassName = '';

        if (isset($label) && '' !== $label && !$element instanceof Button) {

            if ($formClass === 'form-inline') {
                $element->setLabelAttributes(['class' => 'sr-only']);
                $inlineBlockTxt = ' ';

            } else if ($formClass === 'form-horizontal') {
                $labelAttributes = $element->getLabelAttributes();
                $labelClass = [
                    'control-label'
                ];
                if (isset($labelAttributes['class'])) {
                    preg_match_all('/^col-(xs|md|sm)-\d{1,2}$/', $labelAttributes['class'], $matches);
                    if (empty($matches[0])) {
                        $labelClass[] = $this->horizontalDefaultLabelGridClass;
                    } else {
                        $labelClassName = $matches[0][0];
                    }
                    $labelClass[] = $labelAttributes['class'];
                } else {
                    $labelClass[] = $this->horizontalDefaultLabelGridClass;
                    $labelClassName = $this->horizontalDefaultLabelGridClass;
                }
                $element->setLabelAttributes(['class' => implode(' ', $labelClass)]);
            }
            $labelHtml = $labelHelper($element);
        }

        $element->setAttribute('class', $element->getAttribute('class') . ' form-control');
        $elementHtml = $elementHelper($element);


        if (static::$labelClassName === null && !empty($labelClassName)) {
            static::$labelClassName = $labelClassName;
        }

        if (empty($labelClassName)) {
            $labelClassName = static::$labelClassName;
        }

        if (empty($labelClassName)) {
            $labelClassName = 'col-sm-2';
        }

        preg_match_all('/\d{1,2}/', $labelClassName, $matches);
        preg_match_all('/[a-z-]{7}/', $labelClassName, $matchesClassName);



        $errorHelper = $this->getElementErrorsHelper();
        $errorHtml = $errorHelper($element);

        if ($formClass === 'form-horizontal') {

            if (isset($matches[0])) {
                $labelGrid = $matches[0][0];
            }

            $elementClass = [
                $matchesClassName[0][0] . ($this->grid - $labelGrid)
            ];

            if ($element instanceof Button) {
                $elementClass[] = $matchesClassName[0][0] .'offset-' .$labelGrid;
            }

            $elementHtml = sprintf($this->horizontalElementWrap, implode(' ', $elementClass), $elementHtml . $errorHtml);
        }
        return sprintf($this->formWrap, $labelHtml, $elementHtml) . $inlineBlockTxt;
    }
}