<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<style type="text/css">
	.addtd table th, td{border:none; padding: 0;}
</style>

<h2>Article List</h2>
<?php
	if (!empty($_GET['msg'])) {
		$msg = unserialize(urldecode($_GET['msg']));
		foreach ($msg as $key => $value) {
			echo $value;
		}
	}
?>
<div class="addtd">
	<table id="table_id" class="display">
		<thead>
			<tr>
				<th width="2%">No</th>
				<th width="30%">Title</th>
				<th width="40%">Content</th>
				<th width="5%">Category</th>
				<th width="20%">Action</th>
			</tr>
		</thead>
	    <tbody>
			<?php
				$i = 0;
				foreach ($getallpost as $key => $value) {
					$i++;
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $value['title'];?></td>
				<td>
					<?php 
						$text = $value['content'];
						if (strlen($text) > 40) {
							echo $text = substr($text, 0,40);
						}
					?>
				</td>
				<td>
					<?php 
						foreach ($catlist as $key => $cat) {
							if ($cat['id'] == $value['cat']) {
								echo $cat['name'];
							}
						}	
					?>	
				</td>
				<?php
					if (Session::get('level') == 1) { 
				?>
				<td><a href="<?php echo BASE_URL;?>/Admin/editArticle/<?php echo $value['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure you to delete ?')" href="<?php echo BASE_URL;?>/Admin/deleteArticle/<?php echo $value['id'];?>">Delete</a></td>
				<?php } else{ ?> 
					<td>Not Permited</td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<script>
	$(document).ready( function () {
	    $('#table_id').DataTable();
	} );
</script>