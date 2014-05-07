<?php

defined('NO_HACK') or die('Attack...');

// Данные для подключения к базе
define('DATABASE_SERVER', 'localhost');
define('DATABASE_USER', 'test_work');
define('DATABASE_PASS', 'test_work');
define('DATABASE_DB', 'test_work');


// Директория с шаблонами
define('TEMPLATES_DIR', 'templates');

// Подключаемые шаблоны для вывода
$_tempConf =  array(
	'topics_list'	=> 'topics_list.php',
	'topic_page'	=> 'topic_page.php',
	'topic_edit'	=> 'topic_edit.php',	
);

// Директория с модулями
define('MODULES_DIR', 'modules');

// Подключаемые модули
$_modConf =  array(
	'topics_list'	=> 'topics_list.php',
	'topic_page'	=> 'topic_page.php',
	'topic_edit'	=> 'topic_edit.php',	
);

//Кол-во Записей на страницу
define('REC_PER_PAGE', 10);
?>