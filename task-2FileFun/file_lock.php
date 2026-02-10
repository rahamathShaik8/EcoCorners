<?php
echo "<h3>File Locking using flock()</h3>";

$file = "lock_test.txt";

/* Open file in append mode */
$fp = fopen($file, "a");

/* Apply exclusive lock */
if (flock($fp, LOCK_EX)) {

    fwrite($fp, "File locked and written at " . date("H:i:s") . "\n");
    echo "File is locked and data written successfully.<br>";

    /* Release lock */
    flock($fp, LOCK_UN);

} else {
    echo "Unable to lock the file.<br>";
}

/* Close file */
fclose($fp);
?>
