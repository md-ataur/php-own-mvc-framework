<article class="postcontent">
	<?php
	if (isset($postbyid)) {
		foreach ($postbyid as $key => $value) {
			
	?>
	<div class="detials">
		<h2><?php echo $value['title'];?></h2>
		<p>Category: <a href="<?php echo BASE_URL;?>/Index/postByCat/<?php echo $value['cat'];?>"><?php echo $value['name'];?></a></p>
	</div>
	<div class="desc">
		<p><?php echo $value['content'];?></p>
	</div>
	<?php } }?>
</article>





