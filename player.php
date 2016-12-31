<?php

$video = $_REQUEST['file'];
$video = "/var/www/html/video/" . $video;
echo "<html><body>\n";
echo "<video controls autoplay preload=\"auto\" src=\"stream.php?file=$video\" width=\"100%\"></video>\n";
echo "</body></html>\n";
?>
