<?php
require_once('../php/phpConect/mysql_connact.php');
if(isset($_GET['d'])){
$encryption_id=base64_decode($_GET['d']);
$chiper="AES-128-CTR";//خوارزمية التشفير
$option=0;
$encryption_vi='1234567890123456';
$encryption_key='Moad';

$id=openssl_decrypt($encryption_id,$chiper,$encryption_key,$option,$encryption_vi); 
$sql=$conn_link->query("SELECT Image FROM user WHERE UserID=$id")or die("error");
$nameimage=mysqli_fetch_array($sql);
unlink('../image/usersimage/'.$nameimage['0']);

$query=$conn_link->query("DELETE FROM user WHERE UserID=$id")or die("error");

header("location:user.php");


}


?>