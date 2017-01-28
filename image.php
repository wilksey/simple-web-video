<?php

$remoteImage = $_REQUEST['image'];
$imginfo = getimagesize($remoteImage);
header("Content-type: {$imginfo['mime']}");
readfile($remoteImage);

?>
