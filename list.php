<?php
echo "<h1> To do list system</h1><br/>";
echo "Welcome, ".$_COOKIE['login'].'<br/>';
echo "Below you may find your to-do items: ";
echo "<br> <br>";
?>
<html>
  <body>
    <table>
      
        <?php foreach($result as $res):?>
      <tr>
        <td> <?php echo $res['todo_item']; ?>  </td>

        <td>
         <form method = "POST" action='index.php'>
         <input type='hidden' name="item_id" value = <?php echo $res['id']; ?> >
  <input type = 'hidden' name = 'action' value='Delete'>
  <input type="submit" value="Delete"/>
    </form> 
     </td>

     <td>
         <form method = "POST" action='index.php'>
         <input type='hidden' name="item_id" value = <?php echo $res['id']; ?> >
  <input type = 'hidden' name = 'action' value='Edit'>
  <input type="submit" value="Edit"/>
    </form> 
     </td>

      </tr>  
	<?php endforeach;?> 
      
    </table>
    <form method ="POST" action="index.php">
        <strong> Description: </strong> <input type='text' name='description' ><br>
	<input type = 'hidden' name = 'action' value='add'><br>
	<input type="submit" value="Add"/>
    </form>
  </body>
</html>