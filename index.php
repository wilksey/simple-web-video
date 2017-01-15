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
            $filename = pathinfo("$newdir/$entry", PATHINFO_FILENAME);
            if ($extension == "mp4" || $extension == "MP4") {
                $collection[] = "<a href='player.php?file=$newdir/$entry&ext=mp4'><img src=\"image.php?image=$newdir/$filename.jpg\" alt=\"$filename\" style=\"width:128px;height:128px;\" title=\"$entry\"></a>\n";
            } elseif ($extension == "webm" || $extension == "WEBM") {
                $collection[] = "<a href='player.php?file=$newdir/$entry&ext=webm'><img src=\"image.php?image=$newdir/$filename.jpg\" alt=\"$filename\" style=\"width:128px;height:128px;\" title=\"$entry\"></a>\n";
            }
        }
    }
    closedir($handle);



    natsort($collection); // sort.
    $collection = array_reverse($collection, true);
    // print.
    foreach($collection as $item) {
            echo("$item");
    }
}
?>
