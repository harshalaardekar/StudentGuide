<?php
    // Store the file name into variable
    $file = 'AI_Assignment-1.pdf';
    header("Content-type: application/pdf");
    // Send the file to the browser.
    readfile($file);
?>