<?php
echo "<h3>Directory Handling Functions</h3>";

/* getcwd() */
echo "Current Working Directory: " . getcwd() . "<br><br>";

/* scandir() */
echo "<b>Files using scandir():</b><br>";
$files = scandir(".");
foreach ($files as $file) {
    echo $file . "<br>";
}

echo "<br><b>Files using opendir() and readdir():</b><br>";

/* opendir(), readdir(), closedir() */
$dir = opendir(".");
while (($file = readdir($dir)) !== false) {
    echo $file . "<br>";
}
closedir($dir);

/* chdir() */
echo "<br>";
if (chdir("..")) {
    echo "Directory changed using chdir()<br>";
    echo "New Working Directory: " . getcwd() . "<br>";
}
?>
