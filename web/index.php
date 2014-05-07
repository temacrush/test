<?php

define('NO_HACK', true);
require_once('config.php');

$db = new PDO('mysql:host='.DATABASE_SERVER.';dbname='.DATABASE_DB, DATABASE_USER, DATABASE_PASS);
$db->exec('SET CHARACTER SET utf8');

if (isset($_GET['action']) && !empty($_GET['action'])) {
	if (isset($_modConf[$_GET['action']])) {
		include(MODULES_DIR.'/'.$_modConf[$_GET['action']]);
		exit();
	}
}

header("location: http://".$_SERVER['SERVER_NAME']);


?>