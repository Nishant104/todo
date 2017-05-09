<?php


  function deleteTodoItems($user_id,$todo_id){ 
  global $db;
  $query = 'delete from `ns725`.todos where id = :todo_id and user_id
  = :userid';
 $statement = $db->prepare($query);
 $statement->bindValue(':userid',$user_id);
 $statement->bindValue(':todo_id',$todo_id);
 $statement->execute();
 $statement->closeCursor();
 
}
  
   function addTodoItem($user_id,$todo_text,$Date,$Time){
     global $db;
     $query = 'insert into `ns725`.todos(user_id,todo_item,Date,Time) values (:userid,:todo_text,:Date,:Time)';
     $statement = $db->prepare($query);
     $statement->bindValue(':userid',$user_id);
     $statement->bindValue(':todo_text',$todo_text);
     $statement->bindValue(':Date',$Date);
     $statement->bindValue(':Time',$Time);
     $statement->execute();
     $statement->closeCursor();
  
   }

   function editTodoItems($todo_item,$todo_id)
   {
     global $db;
     $query='UPDATE `ns725`.`todos` SET `todo_item` = :todo_item WHERE `todos`.`id` = :todo_id';
 $statement = $db->prepare($query);
 $statement->bindValue(':todo_item',$todo_item);
 $statement->bindValue(':todo_id',$todo_id);
 $statement->execute();
 $statement->closeCursor();
 

   }

   function getTodoItems($user_id){
     global $db;
     $query = 'select * from `ns725`.todos where user_id= :userid';
     $statement = $db->prepare($query);
     $statement->bindValue(':userid',$user_id);
     $statement->execute();
     $result= $statement->fetchAll();
     $statement->closeCursor(); 
     return $result;
   }
   function createUser($username,$password,$firstn,$lastn,$email,$phonen,$bday,$gender){
     global $db;
     $query = 'select * from `ns725`.users where username = :name ';
     $statement = $db->prepare($query);
     $statement->bindValue(':name',$username);
     $statement->execute();
     $result= $statement->fetchAll();
     $statement->closeCursor();
     $count = $statement->rowCount();
     if($count > 0)
     {
      // return true;
      return true;
     }else{

     //$query = 'insert into `ns725`.users (username,passwordHash) values
       // (:name, :pass,)';

        $query = "INSERT INTO `ns725`.`users`( `username`, `passwordHash`, `Firstname`, `Lastname`, `Email`, `phonenumber`, `Birthday`, `gender`) VALUES ('$username','$password','$firstn','$lastn','$email','$phonen','$bday','$gender')";
        $statement = $db->prepare($query);
     //$statement->bindValue(':name',$username);
     $statement->execute();
     
    // $statement->closeCursor();
     return false;
     }
   }
   function isUserValid($username,$password){
     global $db;
     $query = 'select * from `ns725`.users where username = :name and 
     passwordHash = :pass';
     $statement = $db->prepare($query);
     $statement->bindValue(':name',$username);
     $statement->bindValue(':pass',$password);
     $statement->execute();
     $result= $statement->fetchAll();
     $statement->closeCursor();
     $count = $statement->rowCount();
     if($count == 1){
       setcookie('login',$username);
       setcookie('my_id',$result[0]['id']);
       setcookie('islogged',true);
       return true;
     }else{
       unset($_COOKIE['login']);
       setcookie('login',false);
       setcookie('islogged',false);
       setcookie('id',false);
       return false;
     }
   }
?>