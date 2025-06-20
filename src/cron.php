<?php
require_once __DIR__.'functions.php';
// This script should send XKCD updates to all registered emails.
// You need to implement this functionality.
if(php_sapi_name()==='cli'){
    echo "[INFO] Sending XKCD updates tosubscribers...\n";
    sendXKCDUpdatesToSubscribers();
    echo "[INFO] Updates sent./n";
}
else{
    echo"This Script should only be run from command line.\n";
}