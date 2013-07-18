<?php

namespace BehaviorTest\Validators;

use Symfony\Component\CssSelector\CssSelector;

class ExistsSelector extends ExistsXpath {
    protected $selector;

    public function __construct($selector) {
        $this->selector = $selector;
        parent::__construct(CssSelector::toXpath($selector));
    }

    public function getName() {
        return "Validate Element Exists: '{$this->selector}'";
    }

}