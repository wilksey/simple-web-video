<?php

include 'vars.php';

$collection = array();
$todaysVideos = array();
$yesterdaysVideos = array();


if (isset($_REQUEST['subdir'])) {
    $newdir = "$directory" . "/" . $_REQUEST['subdir'];
} else {
    $newdir = $directory;
}

// Here we list videos uploaded today from all directories inside of $directory.
$path = realpath($newdir);
$year = date("Y");
$month = date("n");
$day = date("j");
$today = date("Ymd");
echo "<br>$today<br>\n";
$yesterday  = date("Ymd", mktime(1, 1, 1, $month, $day-1, $year));
$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
foreach($objects as $name => $object) {
    //File
    $theFilename = pathinfo("$name", PATHINFO_FILENAME);
    $theDirectory = pathinfo("$name", PATHINFO_DIRNAME);
    $theExtension = pathinfo("$name", PATHINFO_EXTENSION);
    //If the filename contains today's date, show it on the home page.
    if (strpos($theFilename, $today) !== false) {
        //echo "$theDirectory/$theFilename.$theExtension<br>\n";
        if ($theExtension == "mp4" || $theExtension == "MP4") {
            $todaysVideos[] = "<a href='player.php?file=$theDirectory/$theFilename.$theExtension&ext=mp4'><img src=\"image.php?image=$theDirectory/$theFilename.jpg\" alt=\"$theFilename\" style=\"width:128px;height:128px;\" title=\"$theFilename\"></a>\n";
        } elseif ($theExtension == "webm" || $theExtension == "WEBM") {
            $todaysVideos[] = "<a href='player.php?file=$theDirectory/$theFilename.$theExtension&ext=webm'><img src=\"image.php?image=$theDirectory/$theFilename.jpg\" alt=\"$theFilename\" style=\"width:128px;height:128px;\" title=\"$theFilename\"></a>\n";
        }
    } elseif (strpos($theFilename, $yesterday) !== false) {

    if ($theExtension == "mp4" || $theExtension == "MP4") {
            $yesterdaysVideos[] = "<a href='player.php?file=$theDirectory/$theFilename.$theExtension&ext=mp4'><img src=\"image.php?image=$theDirectory/$theFilename.jpg\" alt=\"$theFilename\" style=\"width:128px;height:128px;\" title=\"$theFilename\"></a>\n";
        } elseif ($theExtension == "webm" || $theExtension == "WEBM") {
            $yesterdaysVideos[] = "<a href='player.php?file=$theDirectory/$theFilename.$theExtension&ext=webm'><img src=\"image.php?image=$theDirectory/$theFilename.jpg\" alt=\"$theFilename\" style=\"width:128px;height:128px;\" title=\"$theFilename\"></a>\n";
        }
    }
}






if ($handle = opendir($newdir)) {


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


    echo("<a href='index.php'>Home</a><br><br>\n");


    echo "<br><br>\n";
    echo "Today's videos\n";
    echo "<br><br>\n";
    natsort($todaysVideos); // sort.
    $todaysVideos = array_reverse($todaysVideos, true);
    // print.
    foreach($todaysVideos as $item) {
            echo("$item");
    }



    echo "<br><br>\n";
    echo "Yesterdays's videos\n";
    echo "<br><br>\n";
    natsort($yesterdaysVideos); // sort.
    $yesterdaysVideos = array_reverse($yesterdaysVideos, true);
    // print.
    foreach($yesterdaysVideos as $item) {
            echo("$item");
    }




    echo "<br><br>\n";
    echo "Video Archives\n";
    echo "<br><br>\n";
    natsort($collection); // sort.
    $collection = array_reverse($collection, true);
    // print.
    foreach($collection as $item) {
            echo("$item");
    }


}
?>
