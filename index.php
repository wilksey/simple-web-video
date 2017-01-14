<?php

include 'vars.php';

$collection = array();


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
                $collection[] = "<a href='index.php?subdir=$entry'>$entry</a><br>\n";
            }
        } else {
            //File
            $extension = pathinfo("$newdir/$entry", PATHINFO_EXTENSION);
            if ($extension == "mp4" || $extension == "MP4") {
                $collection[] = "<a href='player.php?file=$newdir/$entry&ext=mp4'>$entry</a><br>\n";
            } elseif ($extension == "webm" || $extension == "WEBM") {
                $collection[] = "<a href='player.php?file=$newdir/$entry&ext=webm'>$entry</a><br>\n";
            }
        }
    }
    closedir($handle);



    //natsort($collection); // sort.
    // print.
    foreach($collection as $item) {
            echo("$item");
    }
}
?>
