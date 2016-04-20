<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>USMall美猫商城</title>
	<link rel="icon" href="http://www.usmall.us/skin/frontend/default/theme373/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="http://www.usmall.us/skin/frontend/default/theme373/favicon.ico" type="image/x-icon">
	<script type="text/javascript" src="http://www.usmall.us/skin/frontend/default/theme373/js/jquery-1.7.min.js"></script>
	<link href="/pinBlog/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/pinBlog/assets/css/style.css" rel="stylesheet" media="screen">
</head>
<body>
<div class="container">
<?php

	require_once('connection.php');
	$query = "SELECT * FROM pin_blogs WHERE id = " . $_POST['upd_post_id'];
	$infos = fetch($query);

?>
	<h2>宝贝信息</h2>
	<form class="simple_form new_product" action="process.php" accept-charset="UTF-8" method="post">
      	<input type="hidden" name="action" value="update_pin">
        <img src="<?php echo $infos[0]['image']; ?>" width="300" hight="200"/>
        <br>
      	<input type="file" name="image"></input>
      	<input type="hidden" name="upd_pin_id" value= <?php echo $infos[0]['id'] ?>>
		<div class="form-group col-md-6 col-md-offset-3">
			<label class="file optional control-label">标题</label>
			<input class="file optional form-control" name="title" type="text" value="<?php echo $infos[0]['title']; ?>"></input>
		</div>
		<div class="form-group col-md-6 col-md-offset-3">
			<div class="form-group file optional product_image">
				<label class="file optional control-label">心得感受</label>
				<textarea class="file optional form-control" name="description" type="text"><?php echo $infos[0]['description']; ?></textarea>
			</div>
		</div>
      	<input type="submit" class="btn btn-info .col-xs-6 .col-sm-3" value="保存">
	</form>
	<button class="btn btn-default btn btn-default .col-xs-6 .col-sm-3"><a href="/blog/index.php">返回</a></button>
	
</div>				
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
</body>
</html>