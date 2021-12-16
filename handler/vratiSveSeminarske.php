<?php
include '../dbbroker.php';
include '../servis/SeminarskiServis.php';

$broker=Broker::getBroker();
$seminarskiServis= new SeminarskiServis($broker);

try {
    echo json_encode([
        "status"=>200,
        "body"=>$seminarskiServis->getAll()
    ]);
} catch (\Exception $ex) {
    echo json_encode([
        "status"=>500,
        "error"=>$ex->getMessage()
    ]);
}
?>