<?php

namespace BehaviorTest\Actors;

use BehaviorTest\Actor;
use BehaviorTest\State;
use DomXpath as XPath;

class ClickOnLinkXpath implements Actor {

    protected $query = '';

    public function __construct($query) {
        $this->query = $query;
    }

    public function getName() {
        return "Click On A Link: '{$this->query}'";
    }

    /**
     * Act on the state (returns the state post-action)
     *
     * @return State the new (or modified) state
     */
    public function act(State $state) {
        $doc = $state->getDocument();
        $xpath = new XPath($doc);
        $link = $xpath->query($this->query);
        if ($link && $link->length) {
            return $state->resolveLink($link->item(0)->getAttribute('href'));
        }
        var_dump($this->query, $state->getBody());
        throw new \RuntimeException('Attempting to click on non-existing link');
    }

}