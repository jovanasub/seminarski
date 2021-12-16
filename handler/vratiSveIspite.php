<?php
include '../dbbroker.php';
include '../servis/IspitServis.php';

$broker=Broker::getBroker();
$ispitServis= new IspitServis($broker);

try {
    echo json_encode([
        "status"=>200,
        "body"=>$ispitServis->getAll($_GET['naziv'])
    ]);
} catch (\Exception $ex) {
    echo json_encode([
        "status"=>500,
        "error"=>$ex->getMessage()
    ]);
}
?>