<h2>Category List</h2>
<?php
	if (!empty($_GET['msg'])) {
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo $value;
		}
	}
?>
<div class="list">
	<table>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Title</th>
			<th>Action</th>
		</tr>
		<?php
			$i = 0;
			foreach ($cat as $key => $value) {
				$i++;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $value['name'];?></td>
			<td><?php echo $value['title'];?></td>
			<?php
				if (Session::get('level') == 1) { 
			?>
			<td><a href="<?php echo BASE_URL;?>/Admin/editCategory/<?php echo $value['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure you to delete ?');" href="<?php echo BASE_URL;?>/Admin/deleteCategory/<?php echo $value['id'];?>">Delete</a></td>
			<?php } else{ ?> 
				<td>Not Permited</td>
			<?php } ?>
		</tr>
		<?php } ?>
	</table>
</div>
