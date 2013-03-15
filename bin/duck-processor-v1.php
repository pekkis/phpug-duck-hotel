<?php

require_once "../vendor/autoload.php";

use Duck\Duck;
use Duck\Logger;

$log = new Logger("duck-hotel.log");

$numberOfDucks = (int) $argv[1];

for ($x = 1; $x <= $numberOfDucks; $x = $x + 1) {

    $duck = new Duck();

    $duck->signIn();
    $log->write($duck, "signed in");

    $duck->beWashed();
    $log->write($duck, "was washed");

    $duck->beSucked();
    $log->write($duck, "was sucked");

    $duck->beSuckled();
    $log->write($duck, "was suckled with great passion");

    $duck->goForASwim();
    $log->write($duck, "went for a swim");

    $duck->signOut();
    $log->write($duck, "a duck was satisfied and signed out. PROFIT!");

}




