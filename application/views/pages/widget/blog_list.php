<ul id="blog_list" class="list">
<?php 
foreach($blog_list as $record)
{
?>
	<li>
		<a href="<?php echo Url::site('blog/show/'.$record['article_entry_id']);?>"><?php echo $record['article_title'];?></a>
	</li>
<?php
}
?>
</ul>
