<?php include_once 'helpers/helper.php'; ?>

<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/login.css">
<style>
@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}
h1{
   font-family :'product sans' !important;
	font-size:48px !important;
	margin-top:20px;
	text-align:center;
  color: #00ff9d;
}
body {
  background: #1a1a2e;
  font-family: 'Montserrat', sans-serif;
}
.login-form {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    border-radius: 10px;
    background-color: rgba(22, 33, 62, 0.95) !important;
    border: 1px solid #4ecca3;
}
.form-input {
    background-color: #1a1a2e !important;  
    color: #e6e6e6 !important;
    border: 0px !important;
    border-bottom: 2px solid #4ecca3 !important;
}
.form-input:focus {
    border-bottom: 2px solid #00ff9d !important;
    box-shadow: none !important;
}
.text-primary {
    color: #4ecca3 !important;
}
.text-secondary {
    color: #4ecca3 !important;
}
.alert-info {
    background-color: #16213e !important;
    border-color: #4ecca3 !important;
    color: #e6e6e6 !important;
}
.button {
    background: #4ecca3 !important;
    color: #1a1a2e;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
}
.button:hover {
    background: #00ff9d !important;
    transform: translateY(-2px);
}
.back-button {
    background: #16213e !important;
    color: #4ecca3 !important;
    border: 1px solid #4ecca3;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    margin-top: 15px;
    transition: all 0.3s ease;
}
.back-button:hover {
    background: #1a1a2e !important;
    color: #00ff9d !important;
    border-color: #00ff9d;
    transform: translateY(-2px);
}
.buttons-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    padding: 0 60px;
}
</style>
<div class="flex-container">
    <div class="login-form mt-5" style="height: 400px;">
        <h1 class="text-center text-secondary mb-4">Reset Password</h1>
        <div class="alert text-center alert-info mb-0" 
            style="margin-left: 60px; margin-right:60px;" role="alert">   
            An email will be send to you with the instructions on how to reset the password.
        </div>
        <form method="POST" action="includes/reset-request.inc.php">            
            <div class="flex-container">             
                <div>
                    <i class="fa fa-envelope text-primary"></i>
                </div>
                <div>
                    <input type="text" name="user_email" 
                        placeholder="Enter your registered email-id" class="form-input" required>
                </div>
            </div>
            <div class="buttons-container">
                <a href="views/login.php" class="back-button">
                    <i class="fa fa-arrow-left"></i> Back to Login
                </a>
                <div class="submit">
                    <button name="reset-req-submit" type="submit" class="button">
                        Submit <i class="fa fa-paper-plane"></i></button>                    
                </div>
            </div>
        </form>                          
    </div>
</div>
<?php
// تعديل التحقق لمعالجة الخطأ undefined index
if(isset($_GET['err'])) {
    if($_GET['err'] === 'invalidemail') {
        echo '<script>alert("Invalid email");</script>';
    } else if($_GET['err'] === 'sqlerr') {
        echo '<script>alert("An error occured");</script>';        
    } else if($_GET['err'] === 'mailerr') {
        echo '<script>alert("An error occured");</script>';        
    }                    
}

if(isset($_GET['mail'])) {
    if($_GET['mail'] === 'success') {
        echo '<script>alert("Email has been succesfully sent to you");</script>';        
    }
}
?>
<?php subview('footer.php'); ?>