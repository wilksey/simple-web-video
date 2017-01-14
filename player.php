<?php

$file = $_REQUEST['file'];
$ext = $_REQUEST['ext'];
echo "<html><body>\n";
echo "<video controls autoplay preload=\"auto\" src=\"stream.php?file=$file&ext=$ext\" width=\"100%\"></video>\n";
echo "</body></html>\n";
?>
