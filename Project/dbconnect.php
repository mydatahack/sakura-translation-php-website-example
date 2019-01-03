<?php 
    $dbusername = "username";
    $dbpassword = "password";
    $db = "SSID";
    $connect = oci_connect($dbusername, $dbpassword, $db);
    
    if(!$connect){
        echo "Database Connection Error";
        exit;
    }
?>