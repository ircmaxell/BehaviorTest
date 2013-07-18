<?php

namespace BehaviorTest;

interface Validator {

    public function getName();

    /**
     * Validates the current state, returns boolean
     *
     * @return true if the state is valid
     */
    public function validate(State $state);

}