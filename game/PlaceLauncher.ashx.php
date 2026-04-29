<?php
header("Content-Type: application/json");

// status 2 means "Ready to join"
echo json_encode([
    "jobId" => "testsessiin",
    "status" => 2,
    "joinScriptUrl" => "http://rbx.pii.at/game/visit.ashx"
]);
?>
