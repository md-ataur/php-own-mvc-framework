<style type="text/css">
	.addcat table th, td{border:none; padding: 0;}
</style>


<h2>Add Category</h2>
<form action="<?php echo BASE_URL?>/Admin/updateCategory" method="post">
	<div class="addcat">
		<?php
			foreach ($getCatData as $key => $value) {
		?>
		<table>
			<tr>
				<td>Category Name:</td>
				<td><input type="text" name="name" required="1" value="<?php echo $value['name'];?>" /></td>
			</tr>

			<tr>
				<td>Category Title:</td>
				<td><input type="text" name="title" required="1" value="<?php echo $value['title'];?>"/></td>
			</tr>

			<tr>
				<td></td>
				<td>
					<input type="hidden" name="id" value="<?php echo $value['id'];?>" />
					<input type="submit" name="submit" value="Update" />
				</td>
			</tr>
		</table>
		<?php } ?>
	</div>	
</form>	
