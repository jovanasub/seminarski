<?php
include '../dbbroker.php';
include '../servis/IspitServis.php';

$broker=Broker::getBroker();
$ispitServis= new IspitServis($broker);

try {
    $ispitServis->delete($_GET['id']);
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