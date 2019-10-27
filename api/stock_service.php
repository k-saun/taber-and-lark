<?php
$servername = "localhost";
$username = "root";
$password = "mAtra8te1!";
$dbname = "BBscrape";


$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

/*echo "Success: A proper connection to MySQL was made!" . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;*/

$sql = "SELECT * FROM stats WHERE id = (SELECT MAX(id) from stats);";

if ($result = mysqli_query($link, $sql)) {
	$row = $result->fetch_object();

	/*$stats[] = array(
		'temp' => $result['temp'],
		'baseDepth' => $result['baseDepth'],
		'seasonDepth' => $result['seasonDepth'],
		'snowLast48' => $result['snowLast48'],
		'snowLast24' => $result['snowLast24'],
		'snowOvernight' => $result['snowOvernight'],
		'timeStamp' => $result['timeStamp']
	);*/

} else {
    echo "Error: " . $sql . "<br>" . $link->error;
};



$json = json_encode($row);
echo $json;

mysqli_close($link);
?>