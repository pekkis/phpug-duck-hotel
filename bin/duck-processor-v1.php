<?php

require_once "../vendor/autoload.php";

use Duck\Duck;
use Duck\Logger;

$log = new Logger("duck-hotel.log");
$profitLog = new Logger("profits.log");

$numberOfDucks = (int) $argv[1];

$mustSucceed = function (Duck $duck, $method, $successMessage) use ($log) {

    $success = false;

    while (!$success) {
        try {

            $duck->$method();
            $log->write($duck, $successMessage);
            $success = true;

        } catch (\Exception $e) {
            $log->write($duck, "operation failed with exception -> " . $e->getMessage());
        }

    }

};



for ($x = 1; $x <= $numberOfDucks; $x = $x + 1) {

    $duck = new Duck();

    $mustSucceed($duck, 'signIn', 'signed in');

    $mustSucceed($duck, 'beWashed', 'was washed');

    $mustSucceed($duck, 'beSucked', 'was sucked');

    $mustSucceed($duck, 'beSuckled', 'was suckled with great passion');

    $mustSucceed($duck, 'goForASwim', 'went for a swim');

    $mustSucceed($duck, 'signOut', 'a duck was satisfied and signed out. PROFIT!');
    $profitLog->write($duck, 'Profit and eternal glory for the Foundation!');

}




