Login Panel<hr/>
<div class="loginform">
	<form action="<?php echo BASE_URL;?>/Login/loginAuth" method="post">
		<table>
			<tr>
				<td>Username: </td>
				<td><input type="text" name="username" required="1"></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password" required="1"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Login"></td>
			</tr>
		</table>
	</form>
</div>






