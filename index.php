<?php
require('db_connection.php');
require('db.php');
$action = filter_input(INPUT_POST, "action");
echo $action.'current action';
if($action == NULL)
{
  $action = "show_login_page";
}
if($action == "show_login_page")
{
  include('login.php');
}else if($action == 'test_user')
{
  $username = $_POST['reg_uname'];
  $password = $_POST['reg_password'];
  $suc = isUserValid($username,$password);
  if($suc == true)
  {
    $result = getTodoItems($_COOKIE['my_id']);
    include('list.php');
  }else{
    header("Location: badInfo.php");
  }
}else if ($action == 'register')
{
  $name = filter_input(INPUT_POST, 'uname');
  if(isset($name))
  {
      //echo " we want to create a new account";

     $pass = filter_input(INPUT_POST, 'password');
     $first_n=filter_input(INPUT_POST, 'first_name');
     $last_n=filter_input(INPUT_POST, 'last_name');
     $email=filter_input(INPUT_POST, 'email');
     $phone_n=filter_input(INPUT_POST, 'Phonenumber');
     $bday=filter_input(INPUT_POST, 'Birthday');
     $gender=filter_input(INPUT_POST, 'G');

     $query = "INSERT INTO `ns725`.`users`( `username`, `passwordHash`, `Firstname`, `Lastname`, `Email`, `phonenumber`, `Birthday`, `gender`) VALUES ('$name','$pass','$first_n','$last_n','$email','$phone_n','$bday','$gender')";
     
    $exit= createUser($name,$pass,$first_n,$last_n,$email,$phone_n,$bday,$gender);
    $exit;
     if($exit == true)
     {
       include('user_exit.php');
     }else {
     //  header("Location: login.php");
     }
  }
}

else if ($action == 'Edit'){
echo 'inside_edit';
if (isset($_POST['new_desc']) and isset($_POST['item_id']))
     {
      echo $_POST['new_desc'];
      $todo_item=$_POST['new_desc'];
      $todo_id=$_POST['item_id'];

     editTodoItems($todo_item,$todo_id);
     }
   

     $result = getTodoItems($_COOKIE['my_id']);
      include('list.php');
}
else if ($action == 'add')

{
   if (isset($_POST['description']) and $_POST['description']!='')
     {
      
      addTodoItem($_COOKIE['my_id'],$_POST['description']);
     }
     $result = getTodoItems($_COOKIE['my_id']);
      include('list.php');
}else if($action == 'Delete') {
      if(isset($_POST['item_id'])){

        $selected = $_POST['item_id'];
        echo $_POST['item_id'].$_COOKIE['my_id'];

        deleteTodoItems($_COOKIE['my_id'],$selected);
        
    $result = getTodoItems($_COOKIE['my_id']);
    include('list.php');
      }
    }
?>