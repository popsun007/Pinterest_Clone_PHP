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
	<h2>分享宝贝</h2>
	<form class="simple_form new_product" action="/blog/process.php" enctype="multipart/form-data" accept-charset="UTF-8" method="post">
		<input type="hidden" name="action" value="create"></input>
		<div class="form-group col-md-6 col-md-offset-3">
			<div class="form-group file optional product_image">
				<label class="file optional control-label">选择图片</label>
				<input name="image" class="file optional form-control" type="file"></input>
			</div>
		</div>
		<div class="form-group col-md-6 col-md-offset-3">
			<div class="form-group file optional product_image">
				<label class="file optional control-label">标题</label>
				<input class="file optional form-control" name="title" type="text"></input>
			</div>
		</div>
		<div class="form-group col-md-6 col-md-offset-3">
			<div class="form-group file optional product_image">
				<label class="file optional control-label">心得感受</label>
				<textarea class="file optional form-control" type="text" name="description"></textarea>
			</div>
			<input id="submit" type="submit" name="commit" value="分享" class="btn btn-default btn btn-primary .col-xs-6 .col-sm-3">
		</div>
	</form>
	
</div>				
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
</body>
</html>