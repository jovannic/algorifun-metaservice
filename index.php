<?php

$data = array();

$type = $_GET["type"];

if ($type == "youtube") {
	$id = $_GET["id"];
}

// output
header('Content-Type: application/json');
echo json_encode($data);

?>