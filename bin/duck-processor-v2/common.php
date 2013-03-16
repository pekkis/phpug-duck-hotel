<?php

require_once "../../vendor/autoload.php";

use Duck\Logger;
use Duck\Duck;

$json = json_decode(file_get_contents('credentials.json'));

$log = new Logger("duck-hotel.log");
$profitLog = new Logger("profits.log");

$mustSucceed = function (Duck $duck, $method, $successMessage) use ($log) {

    try {

        $duck->$method();
        $log->write($duck, $successMessage);

    } catch (\Exception $e) {
        $log->write($duck, "operation failed with exception -> " . $e->getMessage());
        throw $e;
    }

};
