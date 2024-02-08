<?php
    $myfile = fopen("ceking.txt", "r") or die("Unable to open file!");
    // Output one line until end-of-file
    $cam = (string)fgets($myfile);
    fclose($myfile);
?>