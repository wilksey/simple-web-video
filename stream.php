<?php

include "VideoStream.php";
$video = $_REQUEST['file'];
$stream = new VideoStream("$video");
$stream->start();
exit;

?>
