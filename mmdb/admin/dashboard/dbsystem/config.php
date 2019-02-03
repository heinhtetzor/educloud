<?php

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'mmdb';
    $results_per_page = 6;

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    mysqli_select_db($conn, $dbname);

?>