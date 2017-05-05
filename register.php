<html>
  <head>
  </head>
   <body>

   <style type="text/css">
    div.container{
      border: 3px solid #01f1f1;
      padding: 6px;
      width:300px;
      margin:20px auto;
      text-align:center;  
    }
    .login { 
      background:#f9f9f9; 
    }
    .login div {
      border:2px solid #fff;
      padding:3px;
    }
    .register { 
      background:#f9f9f9; 
    }
    .register div {
      border:2px solid #fff;
      padding:3px;
    }
    input[type=text], input[type=password] {
      padding: 6px 15px;
      margin: 8px 0;
      border: 1px solid #ccc;
    }
    button {
      background-color: #4CAF50;
      color: white;
      padding: 6px 15px;
      margin: 8px 0;
      width: 50%;
    }
  </style>
</head>

<div class='container' align="center">


     <form action="index.php" method="POST">

     <h1>Sign Up</h1>
     <tr>
     <td> User Name:</td>
     <input type="text" name="uname"  placeholder="Enter a user name">
     <br />
     </tr>
     <tr>
     <td> Password :</td>
     <input type="password" name="password"  placeholder="Enter a password">
     <br />
     </tr>
     
     <tr>
     <td> First Name:</td>
     <input type="text" name="first_name"  placeholder="Enter your First name">
     <br />
     </tr>
      <tr>
      <td> Last Name:</td>
      <input type="text" name="last_name"  placeholder="Enter your Last name">
      <br />
      </tr>
      <tr>
      <td> Email:</td>
      <input type="text" name="email"  placeholder="Enter your Email">
       <br />
       </tr>
       <tr>
      <td> Phone number:</td> 
       <input type="text" name="Phonenumber" placeholder="Enter Phone number">
      <br />
       </tr>
       <tr>
       <td> Birthday:</td>
       <input type="date" name="Birthday" placeholder="Enter your birthday">
       <br />
       </tr>
       <tr>
       <td> Gender:</td>
        <label for="g_m">Male</label>   <input required="true" id="g_m" name="G" value="m" type="radio">
             <label for="g_f">Female</label>   <input required="true" id="g_f" name="G" value="f" type="radio">
	<br />

          <input type="submit">Sign up</input>
          <input type="hidden" name="action" value="register">
        </tr>


    
  </body>

</html>