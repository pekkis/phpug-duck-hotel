<?php

require_once "./common.php";

use Duck\Queue;

$queue = new Queue($json->token, $json->project_id, 'signout');
$queue->setTimeout(5);

do {

    list($duck, $id) = $queue->dequeue();

    if (!$duck) {
        sleep(1);
        continue;
    }

    try {
        $mustSucceed($duck, 'signOut', 'a duck was satisfied and signed out. PROFIT!');
        $queue->ack($id);
        $profitLog->write($duck, 'Profit and eternal glory for the Foundation!');

    } catch (\Exception $e) {
        // Empty spaces, what are we living for?
    }

} while(true);







