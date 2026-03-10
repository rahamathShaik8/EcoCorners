<?php
echo "<h3>File Operation Modes using fopen()</h3>";

$file = "modes.txt";

/* r : Read only */
$fp = fopen($file, "r");
echo "<b>Mode r (Read only):</b><br>";
echo fread($fp, filesize($file));
fclose($fp);

echo "<hr>";

/* w : Write only (erase old data) */
$fp = fopen($file, "w");
fwrite($fp, "Written using w mode\n");
fclose($fp);
echo "<b>Mode w (Write only, erase old data):</b><br>";
echo "File overwritten using w mode<br>";

echo "<hr>";

/* a : Append only */
$fp = fopen($file, "a");
fwrite($fp, "Appended using a mode\n");
fclose($fp);
echo "<b>Mode a (Append only):</b><br>";
echo "Data appended<br>";

echo "<hr>";

/* r+ : Read and Write */
$fp = fopen($file, "r+");
fwrite($fp, "Written using r+ mode\n");
rewind($fp);
echo "<b>Mode r+ (Read and Write):</b><br>";
echo fread($fp, filesize($file));
fclose($fp);

echo "<hr>";

/* w+ : Read and Write (erase old data) */
$fp = fopen($file, "w+");
fwrite($fp, "Written using w+ mode\n");
rewind($fp);
echo "<b>Mode w+ (Read and Write, erase old data):</b><br>";
echo fread($fp, filesize($file));
fclose($fp);

echo "<hr>";

/* a+ : Read and Append */
$fp = fopen($file, "a+");
fwrite($fp, "Appended using a+ mode\n");
rewind($fp);
echo "<b>Mode a+ (Read and Append):</b><br>";
echo fread($fp, filesize($file));
fclose($fp);

echo "<hr>";

/* x : Create new file (fail if exists) */
$newFile = "newfile.txt";
$fp = fopen($newFile, "x");
fwrite($fp, "Created using x mode\n");
fclose($fp);
echo "<b>Mode x (Create new file):</b><br>";
echo "newfile.txt created<br>";

echo "<hr>";

/* x+ : Create new file for Read and Write */
$newFile2 = "newfile2.txt";
$fp = fopen($newFile2, "x+");
fwrite($fp, "Created using x+ mode\n");
rewind($fp);
echo "<b>Mode x+ (Create new file for read and write):</b><br>";
echo fread($fp, filesize($newFile2));
fclose($fp);
?>
