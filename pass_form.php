<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/form.css">
<style>
body {
  background: #1a1a2e; 
  font-family: 'Montserrat', sans-serif;
}    

.main-col {
  padding: 40px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
  background-color: rgba(22, 33, 62, 0.95) !important;
  margin-top: 60px;
  border-radius: 10px;
  border: 1px solid #4ecca3;
}

.pass-form {
  background-color: rgba(22, 33, 62, 0.8);
  border: 1px solid #4ecca3;
  padding: 20px;
  margin-top: 30px;
  border-radius: 10px;
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

.btn-success {
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

.btn-success:hover {
  background: #00ff9d !important;
  color: #1a1a2e;
  transform: translateY(-2px);
}

@media screen and (max-width: 768px){
  .main-col {
    padding: 20px;
    margin-top: 20px;
  }  
}

footer {
  bottom: 0;
  width: 100%;
  height: 2.5rem;           
  background: #16213e;
  color: #4ecca3;
  border-top: 1px solid #4ecca3;
}
</style>
<?php
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'invdate') {
          echo '<script>alert("Invalid date of birth")</script>';
      } else if($_GET['error'] === 'moblen') {
          echo '<script>alert("Invalid contact info")</script>';
      } else if($_GET['error'] === 'sqlerror') {
          echo"<script>alert('Database error')</script>";
      }
    }
    ?>
<?php if(isset($_SESSION['userId']) && isset($_POST['book_but'])) {   
    $flight_id = $_POST['flight_id'];
    $passengers = $_POST['passengers']; 
    $price = $_POST['price'];
    $class = $_POST['class'];
    $type = $_POST['type'];
    $ret_date = $_POST['ret_date'];
?>    
<main>
    <div class="container mb-5">
    <div class="col-md-12 main-col">
        <h1 class="text-center">PASSENGER DETAILS</h1>  
        <form action="includes/pass_detail.inc.php" class="needs-validation mt-4" 
            method="POST">

            <input type="hidden" name="type" value=<?php echo $type; ?>>   
            <input type="hidden" name="ret_date" value=<?php echo $ret_date; ?>>   
            <input type="hidden" name="class" value=<?php echo $class; ?>>   
            <input type="hidden" name="passengers" value=<?php echo $passengers; ?>>   
            <input type="hidden" name="price" value=<?php echo $price; ?>>   
            <input type="hidden" name="flight_id" value=<?php echo $flight_id; ?>>   
        <?php for($i=1;$i<=$passengers;$i++) {
            echo'   
            <div class="pass-form">  
            <div class="form-row">
                <div class="col-md">
                    <div class="input-group">
                        <label for="firstname'.$i.'">Firstname</label>
                        <input type="text" name="firstname[]" id="firstname'.$i.'" class="pl-0 pr-0" 
                            required style="width: 100%;">
                    </div>
                </div>
                <div class="col-md">
                    <div class="input-group">
                        <label for="midname'.$i.'">Middlename</label>
                        <input type="text" name="midname[]" id="midname'.$i.'" class="pl-0 pr-0"
                            required style="width: 100%;">
                    </div>
                </div>

                <div class="col-md">
                    <div class="input-group">
                        <label for="lastname'.$i.'">Lastname</label>
                        <input type="text" name="lastname[]" id="lastname'.$i.'" class="pl-0 pr-0"
                             required style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md">
                    <div class="input-group">
                        <label for="mobile'.$i.'">Contact No</label>
                        <input type="number" name="mobile[]" min="0" id="mobile'.$i.'" 
                            required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mt-3"> 
                        <label for="dob">DOB</label>
                        <input id="date" name="date[]" type="date"
                             required>
                    </div>
                </div>
            </div>
            </div>'; }  ?>    
            <div class="col text-center">
                <button name="pass_but" type="submit" 
                class="btn btn-success mt-4">
                <div style="font-size: 1.5rem;">
                <i class="fa fa-lg fa-arrow-right"></i> Proceed  
                </div>
                </button>
            </div>         
        </form>              
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
<?php } ?>

<footer>
	<em><h5 class="text-light text-center p-0 brand mt-2">
				<img src="assets/images/airtic.png" 
					height="40px" width="40px" alt="">				
			Online Flight Booking</h5></em>
	<p class="text-light text-center">&copy; <?php echo date('Y')?> - Berkane Sohaib , Bouberrima ilyes</p>
</footer>