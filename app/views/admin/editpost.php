<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<style type="text/css">
	.addtd table th, td{border:none; padding: 0;}
</style>

<h2>Update Article</h2>

<?php
	foreach ($postbyid as $key => $post) {
		
?>
<form action="<?php echo BASE_URL?>/Admin/updatePost/<?php echo $post['id'];?>" method="post">
	<div class="addtd">
		<table>
			<tr>
				<td>Title:</td>
				<td><input type="text" name="title"  value="<?php echo $post['title'];?>" /></td>
			</tr>
			<tr>
				<td>Content</td>
				<td>
					<textarea name="content">
						<?php echo $post['content'];?>
					</textarea>
					<script>
						CKEDITOR.replace( 'content' );
					</script>
				</td>
			</tr>
			<tr>
				<td>Category</td>
				<td>
					<select name="cat" required="1">
						<option>Select</option>
						<?php 
							foreach ($catlist as $key => $value) {
						?>
						<option 
						<?php
							if ($post['cat'] == $value['id']) { ?>
							selected ="selected"
						<?php }	?>
							value="<?php echo $value['id'];?>"><?php echo $value['name'];?>
							
						</option>
						<?php } ?>
						
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input style="padding: 10px 20px; margin: 10px 0;" type="submit" name="submit" value="Update" /></td>
			</tr>
		</table>
	</div>	
</form>	
<?php } ?>
