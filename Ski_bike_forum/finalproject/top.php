<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Local Ski Resorts From The Perspective of a Local</title>
        <meta name="author" content="Joel Davidson">
        <meta name="description" content="There are many fantastic ski resorts in Vermont. 
        I will be discussing my thoughts on these resorts, many of which I grew up skiing. This topic helps
        to make the world a better place because people need to have fun and the resort they ski at can have 
        a massive effect on that.">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">

        <link rel="stylesheet" media="(max-width: 800px)" href="css/custom-tablet.css?version=<?php print time(); ?>" type="text/css">

        <link rel="stylesheet" media="(max-width: 600px)" href="css/custom-phone.css?version=<?php print time(); ?>" type="text/css">

<!-- Try not to hate on Vail too much. Some people might still like them, somehow... -->

    </head>
<?php

print '<body class="' . $pathParts['filename'] . '">';

print '<!-- ########## Body element ########## -->';
include 'connect-DB.php';
include 'header.php';
include 'nav.php';

?>