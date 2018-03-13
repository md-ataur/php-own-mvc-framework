<style type="text/css">
	.addtd table th, td{border:none; padding: 0;}
</style>

<h2>Make User</h2>
<?php
if (isset($userErrors)) {
echo "<div style='color:red;border:1px solid red; padding:5px 10px; margin:5px;'>";
	foreach ($userErrors as $key => $value) {
		switch ($key) {
			case 'username':
				foreach ($value as $val) {
					echo "Username: ".$val."<br/>";
				}
				break;
			
			case 'password':
				foreach ($value as $val) {
					echo "password: ".$val."<br/>";
				}
				break;

			case 'level':
				foreach ($value as $val) {
					echo "Level: ".$val."<br/>";
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
<form action="http://localhost/project/mvc/User/insertUser" method="post">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" name="password" /></td>
		</tr>
		<tr>
			<td>User Role</td>
			<td>
				<select name="level">
					<option>Select User Role</option>
					<option value="2">Author</option>
					<option value="3">Contributor</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Make User" /></td>
		</tr>
	</table>
</form>	