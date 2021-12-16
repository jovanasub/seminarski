<?php
include '../dbbroker.php';
include '../servis/IspitServis.php';

$broker=Broker::getBroker();
$ispitServis= new IspitServis($broker);

try {
    $ispitServis->create($_POST);
    echo json_encode([
        "status"=>200,
    ]);
} catch (\Exception $ex) {
    echo json_encode([
        "status"=>500,
        "error"=>$ex->getMessage()
    ]);
}
?>