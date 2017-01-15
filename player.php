<?php

$file = $_REQUEST['file'];
$ext = $_REQUEST['ext'];
$description = pathinfo($file, PATHINFO_DIRNAME) . "/" . pathinfo($file, PATHINFO_FILENAME) . ".description";


echo "<html>";
echo "<head><style> p.description { width: 75em; border: 2px solid #000000; word-wrap: break-word; } </style></head>";
echo "<body>\n";
echo "<video controls autoplay preload=\"auto\" src=\"stream.php?file=$file&ext=$ext\" width=\"60%\"></video>\n";
echo "<br><br>\n";
echo "<p class=\"description\">\n";
echo file_get_contents($description);
echo "</p>\n";
echo "</body></html>\n";
?>
