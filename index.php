<?php

include 'vars.php';

$files = array();


if (isset($_REQUEST['subdir'])) {
    $newdir = "$directory" . "/" . $_REQUEST['subdir'];
} else {
    $newdir = $directory;
}


if ($handle = opendir($newdir)) {

    echo("<a href='index.php'>Home</a><br><br><br>\n");

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
        if (is_dir("$newdir/$entry")) {
            //Directory
            if ($entry != "." && $entry != "..") {
                echo("<a href='index.php?subdir=$entry'>$entry</a><br>\n");
            }
        } else {
            //File
            $path_parts = pathinfo("$newdir/$entry");
            $extension=$path_parts['extension'];
            if ($extension == "mp4" || $extension == "MP4") {
                echo("<a href='player.php?file=$newdir/$entry'>$entry</a><br>\n");
            }
        }
    }
    closedir($handle);



    natsort($files); // sort.
    // print.
    foreach($files as $file) {
        if (! is_dir($file)) {
            echo("<a href='player.php?file=$file'>$file</a> <br />\n");
        }
    }
}
?>
