<!DOCTYPE html>
<html>
<head>
<title>JS CSS HTML Kanban Board</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="image/logo.PNG">
    <link rel="stylesheet" href="css/style.css"/>
    <style>
      
    </style>
</head>

<body>


<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <!-- <div class="modal-content"> -->
  <div class="loginForm">
    <span class="close">&times;</span>
    
   <form>
   <h1 class="loginFormText">⟁ Kanban Board</h1>
  <div class="mb-4 input-group-lg col-auto" >
    <label for="addmember" class="form-label">Add Member</label> 
    <input type="text"  id="addmember" class="input-field">
  
  </div>
  <div class="mb-4 input-group-lg col-auto" >
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" id="exampleInputPassword1" class="input-field" >
  </div>

  <div class="mb-4 input-group-lg col-auto" >
    <label for="exampleInputPassword1" class="form-label">Brief description
</label>
    <input type="password" id="exampleInputPassword1" class="input-field" >
  </div>


  
  <button type="button" class="button">Login</button>
 
</form>

   </div>

  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
