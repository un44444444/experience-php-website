日志列表如下：
<?php 
foreach($blog_list as $record)
{
?>
<div>
	<ul>
		<li>编号：<?php echo $record['article_entry_id'];?></li>
		<li>标题：<?php echo $record['article_title'];?></li>
		<li>概要：<?php echo $record['article_summary'];?></li>
	</ul>
</div>
<?php
}
?>
