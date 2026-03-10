<?php
echo "<h3>File Read and Write Functions</h3>";

$file = "test.txt";

/* fopen() and fwrite() */
$fp = fopen($file, "w");
fwrite($fp, "EcoCorners PHP Lab\n");
fwrite($fp, "File Handling Functions\n");
fclose($fp);

echo "Data written using fwrite()<br><br>";

/* fopen() and fread() */
$fp = fopen($file, "r");
$content = fread($fp, filesize($file));
fclose($fp);

echo "<b>Content using fread():</b><br>";
echo "<pre>$content</pre>";

/* file_get_contents() */
$data = file_get_contents($file);
echo "<b>Content using file_get_contents():</b><br>";
echo "<pre>$data</pre>";

/* file_put_contents() */
file_put_contents($file, "Updated using file_put_contents()\n", FILE_APPEND);
echo "Data appended using file_put_contents()<br><br>";

/* file() */
$lines = file($file);
echo "<b>Content using file():</b><br>";
foreach ($lines as $line) {
    echo $line . "<br>";
}
?>
