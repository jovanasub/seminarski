<?php
include '../dbbroker.php';
include '../servis/SeminarskiServis.php';

$broker=Broker::getBroker();
$seminarskiServis= new SeminarskiServis($broker);

try {
    $seminarskiServis->create($_POST);
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