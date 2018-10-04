<?php
include 'functions.php';

$arrContextOptions = [
	'ssl' => [
		'verify_peer' => false,
		'verify_peer_name' => false,
	]
];

$arrayRange = range(0, 58);

ini_set('max_execution_time', 600);
set_time_limit(0);

foreach($arrayRange as $range) {
	$json_url = "https://08ad1pao69.execute-api.us-east-1.amazonaws.com/dev/random_joke";
	$json = file_get_contents($json_url,false,stream_context_create($arrContextOptions));
	$json = file_get_contents($json_url,false,stream_context_create($arrContextOptions));
	$obj = (Object) json_decode($json,true);

	$type = $obj->type;
	$punchline = $obj->punchline;
	$setup = $obj->setup;
	$id = $obj->id;

	if (!jokeExists($id)) {
		saveJoke($id, $setup, $punchline);
	}
}

?>