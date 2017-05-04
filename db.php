<?php


  function deleteTodoItems($user_id,$todo_id){ 
  global $db;
  $query = 'delete from `ns725`.todos where id = :todo_id and user_id
  = :userid,:todo_text';
 $statement = $db->prepare($query);
 $statement->bindValue(':userid',$user_id);
 $statment->execute();
 $statment->closeCursor();
}
  
   function addTodoItem($user_id,$todo_text){
     global $db;
     $query = 'insert into `ns725`.todos(user_id,todo_item) values (:userid,:todo_text)';
     $statement = $db->prepare($query);
     $statement->bindValue(':userid',$user_id);
     $statement->bindValue(':todo_text',$todo_text);
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
       return true;
     }else{
     $query = 'insert into `ns725`.users (username,passwordHash) values
        (:name, :pass,)';
        $query = 'INSERT INTO `ns725`.`users`( `username`, `passwordHash`, `Firstname`, `Lastname`, `Email`, `phonenumber`, `Birthday`, `gender`) VALUES ([value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])';
     $statement = $db->prepare($query);
     $statement->bindValue(':name',$username);
     $statement->bindValue(':pass',$password);
     $statement->execute();
     $statement->closeCursor();
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