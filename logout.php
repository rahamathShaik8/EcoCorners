<?php
session_start();
session_destroy();
header("Location: index.php");
exit();
?>
<a href="logout.php">
    <button>Logout</button>
</a>
