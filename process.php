<?php 
session_start();
require_once("connection.php");

//-----------------------------begin wall post and comment page-------------------------//
if (isset($_POST['action']) && ($_POST['action'] == "create")){
	create($_POST);

}
if (isset($_POST['action']) && ($_POST['action']) == "comment"){
	comment($_POST);
}
if (isset($_POST['action']) && ($_POST['action']) == "delete_post"){
	delete_post($_POST);
}
if (isset($_POST['action']) && ($_POST['action'] == "delete_comment")){
	delete_comment($_POST);
}
if (isset($_POST['action']) && ($_POST['action'] == "show_pin")){
	show_pin($_POST);
}
if (isset($_POST['action']) && ($_POST['action'] == "update_pin")){
	update_pin($_POST);
}
if (isset($_SESSION['main_errors'])){
	header("location: index.php");
}





//===========================below all methods===========================//
function has_number($str){
	for($i=0; $i<strlen($str); $i++){
		if(is_numeric($str[$i])){
			return true;
		}
	}
	return false;
}

function register($post){
	//------------begin validation----------------//
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$_SESSION['errors'][] = "Email format is NOT validate!";
	}
	if (empty($_POST['first_name']) || has_number($_POST['first_name'])){
		$_SESSION['errors'][] = "First name must be no number and not empty.";
	}
	if (empty($_POST['last_name']) || has_number($_POST['last_name'])){
		$_SESSION['errors'][] = "Last name must be no number and not empty.";
	}
	if (empty($_POST['password']) || ($_POST['password'] != $_POST['com_password'])){
		$_SESSION['errors'][] = "Password can not be empty and remain same password.";
	}

	//-------------end validation-------------------//
	
	//--------------communicate with Database------------//
	$query = "INSERT INTO users (email, first_name, last_name, password) 
			VALUES ('{$_POST['email']}','{$_POST['first_name']}','{$_POST['last_name']}','{$_POST['password']}');";
	run_mysql_query($query);
	$_SESSION['log_in'] = true;
	header("location: index.php");
}

function login($post) {
	if (empty($_POST['log_email'])||empty($_POST['log_password'])){
		$_SESSION['errors'][] = "User name or password can not be empty!";
	}
	$query = "SELECT id, CONCAT(first_name, ' ', last_name) AS name FROM users 
			WHERE email = '{$_POST['log_email']}' AND password = '{$_POST['log_password']}';" ;
	$infos = fetch($query);
	if($infos){
		$_SESSION['user_id'] = $infos[0]['id'];
		$_SESSION['user_name'] = $infos[0]['name'];
		header("location: index.php"); 
	}
	else{
		$_SESSION['errors'][] = "User name and password don't match!";
	}
}

function create($post) {
	//uploading image: store image path to DB, and upload image file to "/blog/photo" folder

	if (empty($_POST['title']) || $post['image']){
		$_SESSION['main_errors'][] = "请填写标题并上传图片!";
	}
	else{
		include("upload.php"); //upload image to "/blog/photo"
		$image_path = "/blog/photo/" . $_FILES["image"]["name"];
		$query = "INSERT INTO pin_blogs (title, description, image, created_at, updated_at, user_id)
				 VALUES('{$_POST['title']}', '{$_POST['description']}', '{$image_path}', now(), now(), '{$_SESSION['user_id']}');";
		run_mysql_query($query) or die(mysql_errno());

	}

	header("location: index.php");
	
}

function comment($post) {
	if (empty($_POST['comment'])){
		$_SESSION['main_errors'][] = "You can NOT comment blank message!";
	}
	else{
		$query = "INSERT INTO comments (comment, created_at, updated_at, messages_id, user_id) 
				VALUES('{$_POST['comment']}',now(), now(), '{$_POST['msg_id']}', '{$_SESSION['user_id']}');";
		run_mysql_query($query);
	}
	header("location: index.php");
}

function delete_post($post) {
	$query = "DELETE FROM comments
			WHERE message_id = " . $_POST['del_post_id'];
	run_mysql_query($query);
	$query = "DELETE FROM pin_blogs 
			WHERE id = " . $_POST['del_post_id'];
	run_mysql_query($query);
	header("location: index.php");
}

function delete_comment($post) {
	$query = "DELETE FROM comments
			WHERE id = " . $_POST['del_com_id'];
	run_mysql_query($query);
	header("location: index.php");
}

function update_pin($post){
	$pin_id = $post['upd_pin_id'];
	if(empty($post['image'])){
		$query = "UPDATE pin_blogs 
					SET title = '" . $_POST['title'] . "', description = '" . $_POST['description'] . "', updated_at = now()
					WHERE id = " . $pin_id;
	}
	else{
		$query = "UPDATE pin_blogs 
					SET title = '" . $_POST['title'] . "', description = '" . $_POST['description'] . "', image = '/blog/photo/" . $post['image'] . "', updated_at = now()
					WHERE id = " . $pin_id;
	}
	run_mysql_query($query);
	header("location: show.php?id=" . $pin_id);
}








?>