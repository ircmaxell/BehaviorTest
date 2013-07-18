<?php

namespace BehaviorTest\Interactors;

use BehaviorTest\Interactor;
use BehaviorTest\State;

class Anonymous implements Interactor {

    public function getName() {
        return "Anonymous User";
    }

    public function interact(State $state) {
        // Nothing to do!
    }

}