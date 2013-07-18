<?php

namespace BehaviorTest;

interface Interactor {

    public function getName();

    /**
     * Set up the state (should modify present state, not return new one)
     *
     * @return void
     */
    public function interact(State $state);

}