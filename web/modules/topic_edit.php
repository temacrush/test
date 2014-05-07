<?php

defined('NO_HACK') or die('Attack...');


if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Admin page"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Cancel Auth';
    exit;
} else {
	if (!get_magic_quotes_gpc()) {
		$_SERVER['PHP_AUTH_USER'] = mysql_escape_string($_SERVER['PHP_AUTH_USER']);
		$_SERVER['PHP_AUTH_PW'] = mysql_escape_string($_SERVER['PHP_AUTH_PW']);
		
	}
	$auth_pass = md5($_SERVER['PHP_AUTH_PW']);
	$query = $db->prepare("SELECT COUNT(*) as count FROM `admin_users` WHERE `login` = ? AND `password` = ?");
	$query->execute(array($_SERVER['PHP_AUTH_USER'], $auth_pass));
	$authData = $query->fetchColumn();
	if ($authData == 0) {
		header('WWW-Authenticate: Basic realm="Admin page"');
		Header ("HTTP/1.0 401 Unauthorized");
		echo 'Cancel Auth';
		exit();
	}
}

$topicID = intval($_GET['id']);

if (isset($_POST) && !empty($_POST)) {
	if ($topicID == 0) {
		$date_time = date('Y-m-d H:i:s');
		$query = $db->prepare("INSERT INTO topics (title,content,date) VALUES (?,?,?)");
		$query->execute(array($_POST['title'], $_POST['content'], $date_time));
		$insertId = $db->lastInsertId();
		header("location: http://".$_SERVER['SERVER_NAME']."/edit/".$insertId."/");
		exit();
	}
	else {
		$query = $db->prepare("UPDATE topics SET title = ?, content = ? WHERE id = ?");
		$query->execute(array($_POST['title'], $_POST['content'], $topicID));			
	}
}

if ($topicID > 0) {
	$query = $db->prepare("SELECT * FROM `topics` WHERE id = ?");
	$query->execute(array($topicID));
	$topic_data = $query->fetch();
}
include(TEMPLATES_DIR.'/'.$_tempConf[$_GET['action']]);

?>