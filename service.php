<?php

    include './client.php';

    $ids = [
        '1',
        '4'
    ];

    echo "<pre>";
    print_r($client -> getName($ids));
    echo "</pre>";