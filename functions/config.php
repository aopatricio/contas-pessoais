<?php


/*
 * examples/mysql/config.php
 * 
 * This file is part of EditableGrid.
 * http://editablegrid.net
 *
 * Copyright (c) 2011 Webismymind SPRL
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://editablegrid.net/license
 */
        

// Define here you own values
$config = array(
	"db_name" => "itservicestech",
	"db_user" => "itservicestech",
	"db_password" => "vq9E4KXO",
	"db_host" => "mysql.itservicestech.com.br"
);                

error_reporting(E_ALL);
ini_set('display_errors', '1');

function getdb(){
$db_name = "itservicestech";
$db_user = "itservicestech";
$db_password = "vq9E4KXO";
$db_host = "mysql.itservicestech.com.br";

	try {
   
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
