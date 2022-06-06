<?php

$host = 'localhost';
$user = 'dkstjdgh98';
$pw = '1234';
$dbName = 'buspj';
$con = new mysqli($host, $user, $pw, $dbName);

$id = $_POST['email-address']; // 아이디
$pwl = $_POST['password']; // 패스워드

$query = "select * from USER where user_id='$id' and user_pw='$pwl'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if($id==$row['user_id'] && $pwl==$row['user_pw']){ // id와 pw가 맞다면 login

	echo "<script> alert('로그인 성공'); </script>";
   echo "<script> location.href = 'busmainpage.html'; </script>";

}else{ // id 또는 pw가 다르다면 admin_login 폼으로

   echo "<script> alert('로그인 실패'); </script>";

}

?>