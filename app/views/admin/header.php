<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Advanced PHP OOP Bangla Tutorial</title>
<style>
body {font-family: arial;font-size: 15px;line-height: 18px;margin: 0 auto;width:1050px; background:#EEEEEE}


<?php 
	foreach ($bgcolor as $key => $value) { ?>
	body{background: <?php echo $value['color'];?>}
<?php } ?>



a{color:#3399FF;}
.headeroption {background: #c8c8c8;height: 74px;overflow: hidden;padding-left: 40px;}
.headeroption h2{color: #000;font-size: 30px;padding-top: 2px;text-shadow: 0 1px 1px #fff;}
.content{background: #fff;border: 6px solid #c8c8c8;font-size: 16px;line-height: 22px;margin-bottom: 3px;margin-top: 3px;min-height: 380px;overflow: hidden;padding: 10px;}
article.postcontent {float: left;width: 70%;border-right: 2px solid #e3e3e3; padding: 0 21px 0 0;}
.headeroption a {text-decoration: none;color: #030303;}
.adminleft .widget h3 {margin: 0; background: #686868;padding: 8px 15px;color: #fff;}
.adminleft ul{margin:0px; padding: 0px;}
.adminleft ul li {list-style: none;}
.adminleft ul li a {color:#000; text-decoration:none;background: #ddd;border-bottom: 1px solid #fff;width: 206px;display: block;padding: 6px 16px;}
.adminbar {margin: 20px 0 12px;}
.adminleft {float: left;margin: 0 20px 0 0;}
.adminright {float: left;width: 73%;}
.adminleft ul li a:hover {background: #bababa;color: #000;}
.adminright h2 {margin: 0 0 25px;border-bottom: 2px dashed #ddd;padding: 0 0 11px;}
input[type="text"], input[type="password"] {border:1px solid #ddd;margin-bottom:5px;padding:5px;width:228px;font-size:16px}
input[type="submit"]{cursor: pointer}
.clearer{clear: both;}
select.catsearch {padding: 10px 3px;border: 1px solid #ddd;width: 180px;}
button.submitbtn {padding: 10px 20px;}
.footeroption{height:90px;background:#177de3;overflow:hidden;padding-top:10px;}
.footerone {background: #3aa0ff;border-radius: 5px;float: left;font-size:18px;line-height:23px;margin-left: 10px;padding:6px 10px;text-align:center;text-shadow: 1px 0 2px #fff;width:390px;overflow: hidden;}
.footerone p{margin:0;}
select {padding: 6px 7px;font-size: 15px;}
.dataTables_filter input[type="search"] {padding: 8px}
.list table th, td {border: 1px solid #ddd;padding: 6px 14px; text-align: left;}
</style>

</head>
<body>
  <header class="headeroption">
  	<h2>Advanced PHP OOP [MVC Framework]</h2>
  </header>
  <div class="content">
  	Admin panel <span style="float: right"><a href="<?php echo BASE_URL;?>" target="__blank">Visit Website</a></span> <hr/>

	<div class="adminbar">
		