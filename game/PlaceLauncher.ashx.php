<?php
// Force the app to treat this as a data command, not a webpage
header("Content-Type: application/json; charset=utf-8");

$data = [
    "jobId" => "testsession",
    "status" => 2,
    "joinScriptUrl" => "http://rbx.pii.at/game/visit.ashx"
];

echo json_encode($data);
exit();
