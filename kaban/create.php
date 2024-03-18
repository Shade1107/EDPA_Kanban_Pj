<?php

    
    $create = $_GET;
   

    // var_dump( $create );

?>

<!DOCTYPE html>
<head>
<title>Create</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">  
        
      </div>
      <div class="modal-body">
    

    <div class="form-group">
    <label for="name">Project Title</label>
   <input type="text" name="name" id="name"  class="form-control text-secondary" placeholder="Title Name" />
    </div>

    <br> <div class="form-group">
          			<label for="password">Member</label>
          			<div class="input-group">
                <input type="description" class="form-control" id="description" name="Description" placeholder="AddMember" required>
                  <div class="input-group-append">
                   
                      
    </button>


  </div>
  </div>
  </div>

<br><div><button type="submit" class="btn btn-primary float-right ">Submit</button></div>  </div>

<div class="modal-footer">
  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
  
  
</div>
</div>
</div>
</div>

<button type="submit" ></button>
    


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




<script>
// Open the Bootstrap modal when the page loads
$(document).ready(function() {
  $('#exampleModalCenter').modal('show');
});
</script>


<script>
$(document).ready(function() {
$('#togglePassword').on('click', function() {
const passwordField = $('#password');
const passwordFieldType = passwordField.attr('type');
if (passwordFieldType === 'password') {
  passwordField.attr('type', 'text');
  $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
} else {
  passwordField.attr('type', 'password');
  $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
}
});
});
</script>

</body>

</html>