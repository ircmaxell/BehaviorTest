<?php

namespace BehaviorTest;

interface State {

    public function getUrl();

    public function getHeader($name);

    public function getBody();

    public function getDocument();

    public function getPrevious();

    public function resolveLink($link);
}