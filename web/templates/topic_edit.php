<?php include_once(TEMPLATES_DIR.'/static/header.htm');?>
<a href="/">&larr; К списку постов</a> &nbsp;&nbsp;  <a href="/edit/0/">Добавить новую запись</a>
<form method="post" action="">
	<div class="topicEditBlock">
		<div><label>Название</label> <input type="text" size="60" name="title" value="<?php if ($topicID > 0) echo htmlspecialchars($topic_data['title']);?>" /></div>
		<div><label>Текст</label> <textarea name="content" rows="8" cols="47"><?php if ($topicID > 0) echo htmlspecialchars($topic_data['content']);?></textarea></div>
		<div><input type="submit" value="Сохранить" /></div>
	</div>
 </form>
<?php include_once(TEMPLATES_DIR.'/static/footer.htm');?>