<?php

defined('NO_HACK') or die('Attack...');


$page = intval($_GET['page']);
$query = $db->query("SELECT id, title FROM `topics` ORDER BY date DESC LIMIT ".(($page-1)*REC_PER_PAGE).", ".REC_PER_PAGE);
$topics = $query->fetchAll();
$query = $db->query("SELECT COUNT(*) as count FROM `topics`");
$count = $query->fetchColumn();
$paginate_links = genPaginateLinks($page, $count, REC_PER_PAGE);
include(TEMPLATES_DIR.'/'.$_tempConf[$_GET['action']]);



function genPaginateLinks($page, $elems, $perPage, $step = 5) {
	$pages_count = ceil($elems / $perPage);
	$links = array();	
	// Первая страница
	if ($page == 1) {
		$flink = $pages_count - $step + 1;
		$t = ($flink > 0) ? $step : $pages_count;
		for ($i = 1; $i <= $t; $i++) {
			$_s = array();
			$_s['PAGENAME'] = $i;
			$_s['LINK'] = ($i == $page) ? '' : '/page/'.$i.'/';
			$links[] = $_s;
		}
	}	
	// Последняя страница
	elseif ($page != 1 && $page == $pages_count) {
		$flink = $pages_count - $step + 1;
		$t = ($flink > 0) ? $flink : 1;
		for ($i = $t; $i <= $pages_count; $i++) {
			$_s = array();
			$_s['PAGENAME'] = $i;
			$_s['LINK'] = ($i == $page) ? '' : '/page/'.$i.'/';
			$links[] = $_s;
		}
	}
	else {
		$hstep = floor($step/2);
		$_begin = $page - $hstep;
		$_end = $page + $hstep;
		$r_begin = ($_begin > 0) ? $_begin : 1;
		$l_begin = ($_end < $pages_count) ? $_end : $pages_count;
		for ($i = $r_begin; $i <= $l_begin; $i++) {
			$_s = array();
			$_s['PAGENAME'] = $i;
			$_s['LINK'] = ($i == $page) ? '' : '/page/'.$i.'/';
			$links[] = $_s;
		}		
	}
	return $links;
}
?>