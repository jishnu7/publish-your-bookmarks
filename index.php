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
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=PT+Mono' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <header>My Bookmarks</header>
        <hr/>
         <div id="content">
            <?php echo read($bookmark);?>
        </div>
        <footer>
            Generated with <a href="https://github.com/jishnu7/publish-your-bookmarks">Publish Your Bookmarks</a>.
        </footer>
        <a href="https://github.com/jishnu7/publish-your-bookmarks"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
        <script>
            $(function() {
            $( "ul" ).accordion({active: false,autoHeight: false,navigation: true, collapsible: true});
            });
        </script>
    </body>
</html>
