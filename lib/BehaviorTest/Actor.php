<?php

namespace BehaviorTest;

interface Actor {

    public function getName();

    /**
     * Act on the state (returns the state post-action)
     *
     * @return State the new (or modified) state
     */
    public function act(State $state);

}