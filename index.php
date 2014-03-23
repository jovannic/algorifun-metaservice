<?php

$data = array();

$type = array_key_exists('type', $_GET) ? $_GET['type'] : null;

if ($type == 'youtube') {
	$id = $_GET['id'];

	$url = 'http://gdata.youtube.com/feeds/api/videos/'.$id.'?v=2';

	$xml = simplexml_load_file($url);

	$data['title'] = (string) $xml->title;
	$data['author'] = (string) $xml->author[0]->name;

	$mediaGroup = $xml->children('media', true)->group[0];
	$data['duration'] = (string) $mediaGroup->children('yt', true)->duration[0]->attributes('', true)->seconds[0];
	$data['description'] = (string) $mediaGroup->description;
	$data['views'] = (string) $xml->children('yt', true)->statistics[0]->attributes('', true)->viewCount[0];
	$data['rating'] = (string) $xml->children('gd', true)->rating[0]->attributes('', true)->average[0];
}

// output
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);

?>