<?php
echo "<h3>File & Folder Management Functions</h3>";

/* File names */
$originalFile = "test.txt";
$copyFile = "test_copy.txt";
$renamedFile = "test_renamed.txt";

/* Folder name */
$folder = "demo_folder";

/* is_file() */
if (is_file($originalFile)) {
    echo "$originalFile is a file<br>";
}

/* is_dir() */
if (!is_dir($folder)) {
    mkdir($folder);
    echo "Folder created: $folder<br>";
}

/* copy() */
copy($originalFile, $copyFile);
echo "File copied to $copyFile<br>";

/* rename() */
rename($copyFile, $renamedFile);
echo "File renamed to $renamedFile<br>";

/* unlink() */
unlink($renamedFile);
echo "File deleted: $renamedFile<br>";

/* rmdir() */
rmdir($folder);
echo "Folder deleted: $folder<br>";
?>
