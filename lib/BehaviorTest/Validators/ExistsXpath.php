<?php

namespace BehaviorTest\Validators;

use BehaviorTest\Validator;

class ExistsXpath extends CountXpath {

    protected $query = '';

    public function __construct($query) {
        parent::__construct($query, 1);
    }

    public function getName() {
        return "Validate Element Exists: '{$this->query}'";
    }

}