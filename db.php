<?php

/**
 * PDO handler function 
 */

function getDbHandler()
{
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	return new PDO("mysql:host=" . SLB_DBHOST . ";dbname=" . SLB_DB, SLB_DBUSER, SLB_DBPASS, $options);
}
