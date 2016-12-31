<?php
$files = array();
$dir = opendir('/var/www/html/video'); // open the cwd..also do an err check.
while(false != ($file = readdir($dir))) {

#index.php  player.php  stream.php  VideoStream.php

        if(($file != ".") and ($file != "..") and ($file != "index.php") and ($file != "player.php") and ($file != "stream.php") and ($file != "VideoStream.php")) {
                $files[] = $file; // put in array.
        }   
}

natsort($files); // sort.

// print.
foreach($files as $file) {

//echo "$file <br>";
//echo "<video width=\"400\" controls>";
//echo "<source src=\"$file\" type=\"video/mp4\">";
//echo "</video><br><br>";


if (! is_dir($file)) {
    echo("<a href='player.php?file=$file'>$file</a> <br />\n");
}
}
?>
