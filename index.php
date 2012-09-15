<?php
require("config.php");
require("read.php");

$file = file_get_contents($FILE_NAME);
$bookmark = json_decode($file);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Bookmarks</title>
    </head>
    <body>
        <header>
        </header>
                <?php echo read($bookmark);?>
        <footer>
        </footer>
    </body>
</html>



