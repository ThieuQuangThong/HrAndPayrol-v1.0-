<?php
    // Connect to Sql Server
    $serverName = "DESKTOP-R24V1DT\SQLEXPRESS";
    $connectionInfo = array("Database"=>"HR", "CharacterSet"=>"UTF-8");
    $connsqlsv = sqlsrv_connect($serverName,$connectionInfo);
    if(!$connsqlsv){
        echo "Failed to connect to SQL Server";
        die(print_r(sqlsrv_errors(),true));
    }
    // else{
    //     echo "Connect successfully <br/>";
    // }
    // Connect to MySql
    $serverName2 = 'localhost';
    $port = 3306;
    $user = 'root';
    $pass = '1709';
    $db = 'parollll';
    $connmysql = mysqli_connect($serverName2,$user,$pass,$db,$port);
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL : " . mysqli_connect_error();
    }

?>