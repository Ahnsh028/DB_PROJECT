<html>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<?php

		$host = 'localhost';
		$user = 'dkstjdgh98';
		$pw = '1234';
		$dbName = 'buspj';
		$mysqli = new mysqli($host, $user, $pw, $dbName);

		$user_name = $_POST['name'];
        $user_id = $_POST['id'];
	    $user_pw_1 = $_POST['pw'];
		$user_phone = $_POST['phone'];


		$sql = "insert into USER (
				user_name,
				user_id,
				user_pw,
				user_phone
		)";
		
		$sql = $sql. "values (
				'$user_name',
				'$user_id',
				'$user_pw_1',
				'$user_phone'
		)";

		if($mysqli->query($sql)){ 
		  echo '<script>alert("입력에 성공했습니다.")</script>'; 
		}else{ 
		  echo '<script>alert("입력에 실패했습니다.")</script>';
		}

		mysqli_close($mysqli);
	  
	?>

<script>
	location.href = "user_create.html";
</script>

</html>