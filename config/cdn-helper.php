<?php
$cdnLists = include('../config/cdn-list.php');

function printJSCDNLinks($jsCDNList)
{
    foreach ($jsCDNList as $cdnName => $cdnLink) {
        echo '<script src="' . $cdnLink . '"></script>' . PHP_EOL;
    }
}

function printCSSCDNLinks($cssCDNList)
{
    foreach ($cssCDNList as $cdnName => $cdnLink) {
        echo '<link rel="stylesheet" href="' . $cdnLink . '">' . PHP_EOL;
    }
}
?>
