<?php include_once 'helpers/helper.php'; ?>

<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/form.css">

<?php
if(isset($_GET['error'])) {
    if($_GET['error'] === 'invalidemail') {
        echo '<script>alert("Invalid email")</script>';
    } else if($_GET['error'] === 'pwdnotmatch') {
        echo '<script>alert("Passwords do not match")</script>';
    } else if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Database error')</script>";
    } else if($_GET['error'] === 'usernameexists') {
        echo"<script>alert('Username already exists')</script>";
    } else if($_GET['error'] === 'emailexists') {
        echo"<script>alert('Email already exists')</script>";
    }
}
?>

<style>
  body {
    background: #1a1a2e; 
    font-family: 'Montserrat', sans-serif;
  }    
  
  input {
    border: 0px !important;
    border-bottom: 2px solid #4ecca3 !important;
    color: #e6e6e6 !important;
    border-radius: 0px !important;
    font-weight: bold !important;
    background-color: #1a1a2e !important;  
    padding: 10px !important;      
  }
  
  input:focus {
    border-bottom: 2px solid #00ff9d !important;
    box-shadow: none !important;
  }
  
  *:focus {
    outline: none !important;
  }
  
  label {
    color: #4ecca3 !important;
    font-size: 19px;
    font-weight: 500;
    margin-bottom: 10px;
  }
  
  @font-face {
    font-family: 'product sans';
    src: url('assets/css/Product Sans Bold.ttf');
  }
  
  h1 {
    font-size: 46px !important;
    margin-bottom: 20px;  
    font-family: 'product sans' !important;
    font-weight: bolder;
    color: #00ff9d;
  }
  
  div.form-out {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    background-color: rgba(22, 33, 62, 0.95) !important;
    padding: 40px;
    margin-top: 60px;
    border-radius: 10px;
    border: 1px solid #4ecca3;
  }
  
  .input-group {
    position: relative;
    display: inline-block;
    width: 100%;
  }
  
  button[type="submit"] {
    font-size: 18px;
    color: #1a1a2e;
    background: #4ecca3 !important;
    border: none;
    outline: none;
    padding: 10px 20px;
    margin-top: 50px;
    cursor: pointer;
    transition: 0.5s all ease;
    -webkit-transition: 0.5s all ease;
    -moz-transition: 0.5s all ease;
    -o-transition: 0.5s all ease;
    -ms-transition: 0.5s all ease;
  }
  
  button[type="submit"]:hover {
    background: #00ff9d !important;
    color: #1a1a2e;
    transform: translateY(-2px);
  }
  
  @media screen and (max-width: 768px){
    div.form-out {
      padding: 20px;
      margin-top: 20px;
    }  
  }
</style>

<main>
<div class="container mt-0">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="form-out col-md-6">
      <h1 class="text-center">PASSENGER REGISTRATION</h1>
      
      <form method="POST" action="includes/register.inc.php">
        <div class="form-row">
          <div class="col-1 p-0 mr-1">
            <i class="fa fa-user" 
              style="float: right;margin-top:35px;color:#4ecca3 !important"></i>
          </div>
          <div class="col-10 mb-2">
            <div class="input-group">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" required />                                
            </div>  
          </div>
        </div>
        <div class="form-row">
          <div class="col-1 p-0 mr-1">
            <i class="fa fa-envelope" 
              style="float: right;margin-top:35px;color:#4ecca3 !important"></i>
          </div>                    
          <div class="col-10 mb-2">
            <div class="input-group">
              <label for="email_id">Email</label>
              <input type="text" name="email_id" id="email_id" required>                                         
            </div>                                     
          </div>
        </div>
        <div class="form-row">
          <div class="col-1 p-0 mr-1">
            <i class="fa fa-lock" 
              style="float: right;margin-top:35px;color:#4ecca3 !important"></i>
          </div>                        
          <div class="col-10 mb-2">
            <div class="input-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password"            
                required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter,
                and at least 8 or more characters" />                                        
            </div>                                     
          </div>
        </div>
        <div class="form-row">
          <div class="col-1 p-0 mr-1">
            <i class="fa fa-lock" 
              style="float: right;margin-top:35px;color:#4ecca3 !important"></i>
          </div>                        
          <div class="col-10">
            <div class="input-group">
              <label for="password_repeat">Confirm password</label>
              <input type="password" name="password_repeat" 
                id="password_repeat" required>
            </div>                                     
          </div>                                                                                                  
        </div>
        <div class="row mt-4">
          <div class="col">
            <a href="index.php">
              <button type="button" class="btn btn-info mt-3">
                <div style="font-size: 1.5rem;">
                  <i class="fa fa-home text-light"></i> Home
                </div>
              </button>
            </a> 
          </div>
          <div class="col">
            <button name="signup_submit" type="submit" 
              class="btn btn-success mt-3">
              <div style="font-size: 1.5rem;">
                <i class="fa fa-lg fa-arrow-right"></i> Register
              </div>
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<?php subview('footer.php'); ?>
<script>
$(document).ready(function(){
  $('.input-group input').focus(function(){
    me = $(this) ;
    $("label[for='"+me.attr('id')+"']").addClass("animate-label");
  }) ;
  $('.input-group input').blur(function(){
    me = $(this) ;
    if ( me.val() == ""){
      $("label[for='"+me.attr('id')+"']").removeClass("animate-label");
    }
  }) ;
});    
</script>
 
</main>

<footer>
	<em><h5 class="text-light text-center p-0 brand mt-2">
				<img src="assets/images/airtic.png" 
					height="40px" width="40px" alt="">				
			Online Flight Booking</h5></em>
	<p class="text-light text-center">&copy; <?php echo date('Y')?> - Developed By Berkane Sohaib , Bouberrima ilyes</p>
</footer>