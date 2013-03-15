<?php

require_once "./common.php";

use Duck\Queue;

$queue = new Queue($json->token, $json->project_id, 'wash');
$queue->setTimeout(5);

$nextQueue = new Queue($json->token, $json->project_id, 'suck');
$nextQueue->setTimeout(5);

do {

    list($duck, $id) = $queue->dequeue();

    if (!$duck) {
        sleep(1);
        continue;
    }

    try {
        $mustSucceed($duck, 'beWashed', 'was washed');
        $queue->ack($id);

        $nextQueue->enqueue($duck);

    } catch (\Exception $e) {
        // Empty spaces, what are we living for?
    }

} while(true);







