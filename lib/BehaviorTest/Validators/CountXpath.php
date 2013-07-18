<?php

namespace BehaviorTest\Validators;

use BehaviorTest\State;
use BehaviorTest\Validator;
use DomXpath as XPath;

class CountXpath implements Validator {

    protected $num = 0;
    protected $query = '';

    public function __construct($query, $count) {
        $this->query = $query;
        $this->num = $count;
    }

    public function getName() {
        return "Validate Number Of Elements: '{$this->query}'";
    }

    /**
     * Act on the state (returns the state post-action)
     *
     * @return true if the element exists 
     */
    public function validate(State $state) {
        $doc = $state->getDocument();
        $xpath = new XPath($doc);
        $link = $xpath->query($this->query);
        return $link && $link->length == $this->num;
    }

}