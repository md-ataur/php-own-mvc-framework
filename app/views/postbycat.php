
<article class="postcontent">
<?php
	foreach ($postbycat as $key => $value) {
?>
	<div class="post">
		<div class="detials">
			<h2><?php echo $value['title'];?></h2>
			<p>Category: <?php echo $value['name'];?></p>
		</div>
		<p>
		<?php 
			$text = $value['content'];
			if (strlen($text) > 300) {
				echo $text = substr($text, 0,300);
			}
			
		?>
		</p>
		<div class="readmore"><a href="<?php echo BASE_URL;?>/Index/postDetails/<?php echo $value['id'];?>">Read More...</a></div>
	</div>
<?php } ?>
</article>





