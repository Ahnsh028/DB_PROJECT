<?php

$host = 'localhost';
$user = 'dkstjdgh98';
$pw = '1234';
$dbName = 'buspj';
$con = new mysqli($host, $user, $pw, $dbName);

$id = $_POST['id']; // 아이디
$pw = $_POST['pw']; // 패스워드

$query = "select * from user where id='$id' and pw='$pw'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if($id==$row['id'] && $pw==$row['pw']){ // id와 pw가 맞다면 login

	echo "<script> alert('로그인 성공'); </script>";
	echo "<script> location.href = 'success.html'; </script>";

}else{ // id 또는 pw가 다르다면 admin_login 폼으로

   echo "<script> alert('로그인 실패'); </script>";
   echo "<script> location.href = 'login.html'; </script>";

}

?>