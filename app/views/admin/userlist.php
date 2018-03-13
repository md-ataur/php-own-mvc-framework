<h2>User List</h2>
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
			<th>Username</th>
			<th>Level</th>
			<th>Action</th>
		</tr>
		<?php
			$i = 0;
			foreach ($userlist as $key => $value) {
				$i++;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $value['username'];?></td>
			<td>
			<?php 
				if ($value['level'] == 1) {
					echo "Admin";
				}elseif($value['level'] == 2) {
					echo "Author";
				}elseif($value['level'] == 3) {
					echo "Contributor";
				}
				
			?>
					
			</td>
			<td><a onclick="return confirm('Are you sure you to delete ?');" href="<?php echo BASE_URL;?>/User/deleteUser/<?php echo $value['id'];?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</div>
