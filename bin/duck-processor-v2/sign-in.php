<?php

require_once "./common.php";

use Duck\Duck;
use Duck\Logger;
use Duck\Queue;

$numberOfDucks = (int) $argv[1];

$queue = new Queue($json->token, $json->project_id, 'wash');
$queue->setTimeout(5);

for ($x = 1; $x <= $numberOfDucks; $x = $x + 1) {

    $duck = new Duck();

    try {
        $mustSucceed($duck, 'signIn', 'signed in');
        $queue->enqueue($duck);
    } catch (\Exception $e) {
        // Empty spaces, what are we living for?
    }

}




