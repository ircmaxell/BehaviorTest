<?php

require_once 'vendor/autoload.php';

use BehaviorTest\Test;
use BehaviorTest\State\Guzzle;
use BehaviorTest\Interactors\Anonymous as AnonymousUser;
use BehaviorTest\Actors\ClickOnLinkSelector;
use BehaviorTest\Validators\ExistsSelector;
use BehaviorTest\Validators\CountSelector;


$test = new Test;
$home =  new Guzzle("http://blog.ircmaxell.com/");

$test->add("Blog First Link Test", $home)
    ->asA(new AnonymousUser)
    ->when(new ClickOnLinkSelector('div.post-outer h3.post-title a'))
    ->should(new ExistsSelector('a[href*="wp-db.php"]'));

$test->add("Count Number Of Posts In PHP", $home)
    ->asA(new AnonymousUser)
    ->when(new ClickOnLinkSelector('div.post-footer span.post-labels a[href*="PHP"]'))
    ->should(new CountSelector('h3.post-title', 20));

$test->run();

