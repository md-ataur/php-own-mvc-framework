<style type="text/css">
	.addtd table th, td{border:none; padding: 0;}
</style>

<h2>UI Option</h2>
<?php
	if (!empty($_GET['msg'])) {
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo $value;
		}
	}
?>
<form action="<?php echo BASE_URL?>/Admin/updateUI" method="post">
	<div class="addtd">
		<?php
			foreach ($bgcolor as $key => $value) {
				
		?>
		<table>
			<tr>
				<td>Change Background Color:</td>
				<td><input type="color" name="color" value="<?php echo $value['color'];?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Save" /></td>
			</tr>
		</table>
		<?php }?>
	</div>	
</form>	
