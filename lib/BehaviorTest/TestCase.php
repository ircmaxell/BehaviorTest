<?php

namespace BehaviorTest;

class TestCase {

    protected $name = '';

    protected $state = null;

    protected $steps = array();

    public function __construct($name, State $state) {
        $this->name = $name;
        $this->state = $state;
    }

    public function interact(Interactor $interactor) {
        $this->steps[] = $interactor;
        return $this;
    }

    public function asA(Interactor $interactor) {
        return $this->interact($interactor);
    }

    public function act(Actor $action) {
        $this->steps[] = $action;
        return $this;
    }

    public function when(Actor $action) {
        return $this->act($action);
    }

    public function then(Validator $validator) {
        return $this->validate($validator);
    }

    public function should(Validator $validator) {
        $this->validate($validator);
    }

    public function validate(Validator $validator) {
        $this->steps[] = $validator;
        return $this;
    }

    public function test() {
        echo "Testing {$this->name}\n";
        $state = $this->state;
        foreach ($this->steps as $step) {
            echo " [" . $step->getName() . "]\n";
            try {
                switch (true) {
                    case $step instanceof Interactor:
                        $step->interact($state);
                        break;
                    case $step instanceof Actor:
                        $state = $step->act($state);
                        break;
                    case $step instanceof Validator:
                        if (!$step->validate($state)) {
                            echo " FAILED\n";
                            return false;
                        }
                        break;
                    default:
                        throw new \LogicException('Unknown Step Type');
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
                echo "\n FAILED\n";
                return false;
            }
        }
        echo " PASSED!\n";
        return true;
    }

}