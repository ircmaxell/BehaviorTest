<?php

namespace BehaviorTest\Validators;

use Symfony\Component\CssSelector\CssSelector;

class CountSelector extends CountXpath {
    protected $selector;

    public function __construct($selector, $count) {
        $this->selector = $selector;
        parent::__construct(CssSelector::toXpath($selector), $count);
    }

    public function getName() {
        return "Validate Number Of Elements: '{$this->selector}'";
    }

}