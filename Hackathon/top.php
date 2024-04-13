<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Recreational Forum of Vermont</title>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> <!-- JS needed for maps widget -->
        <script type="module" src="./index.js"></script> <!-- more JS -->
        <meta name="author" content="Michael Hayes">
        <meta name="description" content="This is a forum for people who love skiing and biking in Vermont.  We encourage users to post about their recent outdoor adventures in the Green Mountain State.">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">

        <link rel="stylesheet" media="(max-width: 800px)" href="css/custom-tablet.css?version=<?php print time(); ?>" type="text/css">

        <link rel="stylesheet" media="(max-width: 600px)" href="css/custom-phone.css?version=<?php print time(); ?>" type="text/css">

<!-- Websites rock! Very Exciting. -->

    </head>
<?php

print '<body class="' . $pathParts['filename'] . '">';

print '<!-- ########## Body element ########## -->';
include 'connect-DB.php';
include 'header.php';
include 'nav.php';

?>
