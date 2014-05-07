<?php

defined('NO_HACK') or die('Attack...');


$topicID = intval($_GET['id']);
$query = $db->prepare("SELECT * FROM `topics` WHERE id = ?");
$query->execute(array($topicID));
$topic_data = $query->fetch();
include(TEMPLATES_DIR.'/'.$_tempConf[$_GET['action']]);


?>