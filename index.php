<?php

$data = array();

$type = array_key_exists('type', $_GET) ? $_GET['type'] : null;

if ($type == 'youtube') {
	$id = $_GET['id'];
}

// output
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);

?>