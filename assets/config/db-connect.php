<?php
    $server = 'localhost';
    $username = 'u162278070_early';
    $password = '3H=bad:Op';
    $dataBase = 'u162278070_earlyTransport';
    $connection = mysqli_connect($server,$username,$password,$dataBase);

    if (!$connection) {
      die("Something went wrong".mysqli_connect_error());
    }