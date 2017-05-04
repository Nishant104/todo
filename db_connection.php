<?php
 $dsn = 'mysql:host=sql1.njit.edu;dbname=ns725';
 $username = 'ns725';
 $password = 'XnOKTujju';
 try{
   $db = new PDO($dsn,$username,$password);
 }catch (PDOException $e){
   $error_message = $e->getMessage();
   echo $error_message;
   exit();
 }
?>