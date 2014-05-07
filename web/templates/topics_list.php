<?php include_once(TEMPLATES_DIR.'/static/header.htm');?>

Страницы: 
<?php foreach($paginate_links as $key => $val) {
	if ($val['LINK'] == '') echo $val['PAGENAME'].' ';
	else echo '<a href="'.$val['LINK'].'">'.$val['PAGENAME'].'</a> ';
} ?>
  &nbsp;&nbsp;&nbsp; Всего записей - <b><?=$count;?></b>. [ <a href="/edit/0/">Добавить новую запись</a> ]
 
 <?php foreach($topics as $key => $val):?>
	<div class="topic_list">
		<a href="/topic/<?=$val['id'];?>/"><?=$val['title'];?></a> &nbsp;&nbsp;&nbsp; [ <a href="/edit/<?=$val['id'];?>/">ред</a> ]
	</div>
 <?php endforeach; ?>
 
Страницы: 
<?php foreach($paginate_links as $key => $val) {
	if ($val['LINK'] == '') echo $val['PAGENAME'].' ';
	else echo '<a href="'.$val['LINK'].'">'.$val['PAGENAME'].'</a> ';
} ?>
  &nbsp;&nbsp;&nbsp; Всего записей - <b><?=$count;?></b>. [ <a href="/edit/0/">Добавить новую запись</a> ]

 
<?php include_once(TEMPLATES_DIR.'/static/footer.htm');?>