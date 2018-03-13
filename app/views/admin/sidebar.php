<aside class="adminleft">
	<div class="widget">
		<h3>Site Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL;?>/Admin">Home</a></li>
			<li><a href="<?php echo BASE_URL;?>/Admin/uioption">UI Option</a></li>
			<li><a href="<?php echo BASE_URL;?>/Login/logout">Logout</a></li>
		</ul>
	</div>
	<?php if(Session::get('level') == 1){ ?>
	<div class="widget">
		<h3>User Manage</h3>
		<ul>
			<li><a href="<?php echo BASE_URL;?>/User/addUser">Add User</a></li>
			<li><a href="<?php echo BASE_URL;?>/User/userList">User List</a></li>
		</ul>
	</div>
	<?php } ?>
	
	<?php if(Session::get('level') == 1 || Session::get('level') == 2){ ?>
	<div class="widget">
		<h3>Category Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL;?>/Admin/addCat">Add Category</a></li>
			<li><a href="<?php echo BASE_URL;?>/Admin/categoryList">Category List</a></li>
		</ul>
	</div>
	<?php } ?>

	<div class="widget">
		<h3>Post Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL;?>/Admin/addArticle">Add Article</a></li>
			<li><a href="<?php echo BASE_URL;?>/Admin/articleList">Article List</a></li>
		</ul>
	</div>
</aside>
<article class="adminright">