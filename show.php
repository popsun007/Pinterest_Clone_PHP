<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>USMall美猫商城</title>
	<link rel="icon" href="http://www.usmall.us/skin/frontend/default/theme373/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="http://www.usmall.us/skin/frontend/default/theme373/favicon.ico" type="image/x-icon">
	<script type="text/javascript" src="http://www.usmall.us/skin/frontend/default/theme373/js/jquery-1.7.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href="/pinBlog/assets/css/style.css" rel="stylesheet" media="screen">
</head>
<body>
<div class="container">
<?php
	require_once("connection.php");
	$query = "SELECT * FROM pin_blogs WHERE id = " . $_GET['id'];
	$infos = fetch($query) or die(mysql_errno());

?>
	<h2>宝贝信息</h2>
    <div class="grid-item box panel panel-default" style="max-height: 25em; max-width: 20em;">
		<div class="panel-heading text-center">
			<img src="<?php echo $infos[0]['image']; ?>" width="100%" hight="100%" />
		    <h4><?php echo $infos[0]['title'] ?></h4>
		</div>
		<div class="panel-footer text-center">
			<?php echo $infos[0]['description'] ?>
		</div>
	    <form action="edit.php" method="post">
	      <input type="hidden" name="action" value="update_pin">
	      <input type="hidden" name="upd_post_id" value= <?php echo $infos[0]['id'] ?>>
	      <input type="submit" class="btn btn-info .col-xs-6 .col-sm-3" value="修改">
	    </form>
	    <form action="process.php" method="post">
	      <input type="hidden" name="action" value="delete_post">
	      <input type="hidden" name="del_post_id" value= <?php echo $infos[0]['id'] ?>>
	      <input type="submit" class="btn btn-danger .col-xs-6 .col-sm-3" value="删除">
	    </form>
		<a href="/blog/index.php">返回</a>
	</div>

</div>				
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
</body>
</html>