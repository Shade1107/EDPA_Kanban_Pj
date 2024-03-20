<?php 
require_once('header&footer/header.php');
?>
 <link rel="icon" type="image/png" href="image/logo.PNG">
     <!--  <form class="input-container">
        <div class="fields">
          <input id="title" placeholder="title..." />
          <input id="description" placeholder="description..." />
        </div>
        <input type="submit" id="submit-button" />
      </form> -->

      <style>
  .loginForm{
    width: 500px;
    height: 600px;
/*    background: linear-gradient(to right,  rgb(185, 43, 39), rgb(21, 101, 192));*/
    margin: 70px 500px;
/*    box-shadow: 10px 10px 5px rgb(67, 27, 27);*/
    border-radius: 20px;
    /* background-image: linear-gradient(  indianred,black); */
  
  }

  .input-field {
     width: 470px; 
     height: 50px;
     border-radius: 20px;
     margin: 20px 15px;
     box-shadow: 2px 2px 10px #242b34;
      background: white;
      border: none;
  }/* Adjust width as needed */

  .plustext{
        padding: 0px 120px;
        color: white;
       font-size: 30px;
      }

      .button{
        margin: 0px 180px;
      }
  
 </style>
    </header>
    
      <div class="loginForm">
      <form action="editfunc.php" method="Post">
          <h1 class="loginFormText">Edit Member</h1>
           <div class="mb-4 input-group-lg col-auto" >
            <label for="name" class="form-label">Name</label>
            <input type="text"  id="name" class="input-field">
           </div>

           <div class="mb-4 input-group-lg col-auto">
           <label for="email" class="form-label">Email</label>
            <input type="email"  id="email" class="input-field">
           </div>

           <div class="mb-4 input-group-lg col-auto">
           <label for="password" class="form-label">Password</label>
            <input type="password"  id="password" class="input-field">
           </div>

           <div class="mb-4 input-group-lg col-auto">
            <select class="input-field " name="role">
              <option selected disabled>Select Role</option>
              <option value="admin">Admin</option>
              <option value="member">Member</option>
            </select>
           
           </div>

           <button type="submit" class="button" id="submit-button">Submit</button> 

          </form>
      </div>
    <div class="error-container"></div>



  </body>
</html>
