
<h2>Update Category</h2>

<?php
	if (isset($msg)) {
		echo $msg;
	}
?>

<form action="http://localhost/project/mvc/Category/updateCat" method="post">
	<table>
		<?php
			if (isset($getCatData)) {
				foreach ($getCatData as $value) {
			
		?>
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
				<input type="hidden" name="id" value="<?php echo $value['id'];?>"/>
				<input type="submit" name="submit" value="update" />
			</td>
		</tr>
		<?php } }?>
	</table>
</form>	
