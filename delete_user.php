<?php
	session_start();
	// include database file
	include_once 'config_database.php';
	include_once 'users.php';
	
	// get database connection
	$database = new database();
	$db = $database->getConnection();
	$user = new users($db);

	// set user id to be deleted
	$user->id = $_GET['id'];

	// delete the user
	if ($user->delete()) {
		$_SESSION['msg'] = 'ลบข้อมูลแล้ว';
	} else {
		$_SESSION['msg'] = "ไม่สามารถลบข้อมูลได้ โปรดตรวจสอบ";
	}
	header('Location: manage_user.php');
?>
<script>	
	alert("<?php echo $msg ?>");
	window.location = "index.php";
</script>