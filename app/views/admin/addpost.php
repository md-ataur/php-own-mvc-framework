<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<style type="text/css">
	.addtd table th, td{border:none; padding: 0;}
</style>

<h2>Add Article</h2>

<?php
if (isset($postErrors)) {
echo "<div style='color:red;border:1px solid red; padding:5px 10px; margin:5px;'>";
	foreach ($postErrors as $key => $value) {
		switch ($key) {
			case 'title':
				foreach ($value as $val) {
					echo "Ttile: ".$val."<br/>";
				}
				break;
			
			case 'content':
				foreach ($value as $val) {
					echo "Content: ".$val."<br/>";
				}
				break;

			case 'cat':
				foreach ($value as $val) {
					echo "Ctegory: ".$val."<br/>";
				}
				break;
					
			default:
				# code...
				break;
		}
	}
	echo "</div>";
} else {
	# code...
}

?>

<form action="<?php echo BASE_URL?>/Admin/addPost" method="post">
	<div class="addtd">
		<table>
			<tr>
				<td>Title:</td>
				<td><input type="text" name="title" /></td>
			</tr>

			<tr>
				<td>Content</td>
				<td>
					<textarea name="content"></textarea>
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
						<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
						<?php } ?>
						
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input style="padding: 10px 20px; margin: 10px 0;" type="submit" name="submit" value="SAVE" /></td>
			</tr>
		</table>
	</div>	
</form>	
