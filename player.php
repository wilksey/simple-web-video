<?php

$file = $_REQUEST['file'];
echo "<html><body>\n";
echo "<video controls autoplay preload=\"auto\" src=\"stream.php?file=$file\" width=\"100%\"></video>\n";
echo "</body></html>\n";
?>
