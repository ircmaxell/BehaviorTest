<?php

namespace BehaviorTest\Actors;

use Symfony\Component\CssSelector\CssSelector;

class ClickOnLinkSelector extends ClickOnLinkXpath {
    protected $selector;
    
    public function __construct($selector) {
        $this->selector = $selector;
        parent::__construct(CssSelector::toXpath($selector));
    }

    public function getName() {
        return "Click On A Link: '{$this->selector}'";
    }

}