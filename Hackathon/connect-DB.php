<?php

    $databasename = 'MHAYES17_labs';
    $dsn = 'mysql:host=webdb.uvm.edu; dbname=' . $databasename;
    $username = 'mhayes17_writer';
    $password = 'ki2BLWHHczKb';

    $pdo = new PDO($dsn, $username, $password);
?>