<?php

namespace BehaviorTest;

class Test {

    protected $cases = array();

    public function add($name, State $state) {
        $case = new TestCase($name, $state);
        $this->cases[] = $case;
        return $case;
    }

    public function run() {
        $result = true;
        foreach ($this->cases as $case) {
            $result &= $case->test();
        }
        echo ($result ? "SUCCESS!\n" : "FAILED\n");
    }

}