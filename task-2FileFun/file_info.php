<?php
echo "<h3>File Information Functions</h3>";

$file = "test.txt";

/* Check file exists */
if (file_exists($file)) {

    echo "File Name: " . $file . "<br>";

    echo "File Size: " . filesize($file) . " bytes<br>";

    echo "File Type: " . filetype($file) . "<br>";

    echo "Last Access Time: " . date("d-m-Y H:i:s", fileatime($file)) . "<br>";

    echo "Last Modified Time: " . date("d-m-Y H:i:s", filemtime($file)) . "<br>";

    echo "Last Changed Time: " . date("d-m-Y H:i:s", filectime($file)) . "<br>";

    echo "File Permissions: " . substr(sprintf('%o', fileperms($file)), -4) . "<br>";

    echo "File Owner ID: " . fileowner($file) . "<br>";

    echo "File Group ID: " . filegroup($file) . "<br>";

    echo "File Inode: " . fileinode($file) . "<br>";

} else {
    echo "File does not exist.";
}
?>
