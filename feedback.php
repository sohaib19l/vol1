<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php');    ?>
<link rel="stylesheet" href="assets/css/form.css">
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
  
  textarea {
    color: #e6e6e6 !important;
    border: 3px solid #4ecca3 !important;
    background-color: rgba(22, 33, 62, 0.95) !important;
    font-weight: bold !important;
    padding: 10px !important;
  }
  
  textarea:focus {
    border: 3px solid #00ff9d !important;
  }
  
  select {
    border: 0px !important; 
    border-bottom: 2px solid #4ecca3 !important; 
    background-color: rgba(22, 33, 62, 0.95) !important;
    font-weight: bold !important;
    color: #e6e6e6 !important;
    width: 100%;
    padding: 10px !important;
  }
  
  .rating {
    display: inline-block;
    position: relative;
    height: 50px;
    line-height: 50px;
    font-size: 50px;
  }
  
  .rating label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    cursor: pointer;
  }
  
  .rating label:last-child {
    position: static;
  }
  
  .rating label:nth-child(1) {
    z-index: 5;
  }
  
  .rating label:nth-child(2) {
    z-index: 4;
  }
  
  .rating label:nth-child(3) {
    z-index: 3;
  }
  
  .rating label:nth-child(4) {
    z-index: 2;
  }
  
  .rating label:nth-child(5) {
    z-index: 1;
  }
  
  .rating label input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
  }
  
  .rating label .icon {
    float: left;
    color: transparent;
  }
  
  .rating label:last-child .icon {
    color: #4ecca3;
  }
  
  .rating:not(:hover) label input:checked ~ .icon,
  .rating:hover label:hover input ~ .icon {
    color: #00ff9d;
  }
  
  .rating label input:focus:not(:checked) ~ .icon:last-child {
    color: #4ecca3;
    text-shadow: 0 0 5px #00ff9d;
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
    text-align: center;
  }
  
  .input-group {
    position: relative;
    display: inline-block;
    width: 100%;
  }
  
  .form-box {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    background-color: rgba(22, 33, 62, 0.95) !important;
    padding: 40px;
    margin-top: 60px;
    border-radius: 10px;
    border: 1px solid #4ecca3;
  }
  
  div.form-group label {
    color: #4ecca3 !important;
    font-weight: 500;
  }
  
  div.rating label {
    font-size: 40px !important;
  }
  
  button[name="feed_but"] {
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
  
  button[name="feed_but"]:hover {
    background: #00ff9d !important;
    color: #1a1a2e;
    transform: translateY(-2px);
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

<main>
<?php
if(isset($_GET['error'])) {
    if($_GET['error'] === 'invalidemail') {
        echo '<script>alert("Invalid email")</script>';
    } else if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Database error')</script>";
    } else if($_GET['error'] === 'success') {
      echo"<script>alert('Thank you for your Feedback')</script>";
    } 
}
?>
<div class="container mb-4">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 form-box">
      <h1><i class="far fa-comment-alt"></i> FEEDBACK</h1>
      <form action="includes/feedback.inc.php" method="POST">
        <div class="row justify-content-center">  
            <div class="col-12">              
              <div class="input-group">
                  <label for="user_id">Email</label>
                  <input type="text" name="email" id="user_id" required>
                </div>              
            </div>                      
            <div class="col-12 mt-4">
              <div class="form-group">         
                <label for="exampleFormControlTextarea1">What was your first impression
                    when you entered the website?</label>     
                <textarea class="form-control" id="exampleFormControlTextarea1" name="1"                
                  rows="3" required></textarea>
              </div>                
            </div>             
            
            <div class="col-12 mt-4">
              <div class="form-group">         
                <select class="mt-4" name="2" required>
                  <option selected disabled>How did you first hear about us?</option>
                  <option>Search Engine</option>
                  <option>Social Media</option>
                  <option>Friend/Relative</option>
                  <option>Word of Mouth</option>
                  <option>Television</option>
                  <option>Other</option>
                </select> 
              </div>                
            </div>                   
            
            <div class="col-12 mt-4">
              <div class="form-group">         
                <label for="exampleFormControlTextarea2">Is there anything missing on this page?</label>     
                <textarea class="form-control" id="exampleFormControlTextarea2" name="3"                
                  rows="3" required></textarea>
              </div>                
            </div>          
        </div>  
      
        <div class="row">
          <div class="col-12 text-center mt-4">
            <label>Your Rating</label>
            <div class="rating">  
              <label>
                <input type="radio" name="stars" value="1" required />
                <span class="icon">★</span>
              </label>
              <label>
                <input type="radio" name="stars" value="2" required />
                <span class="icon">★</span>
                <span class="icon">★</span>
              </label>
              <label>
                <input type="radio" name="stars" value="3" required />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
              </label>
              <label>
                <input type="radio" name="stars" value="4" required />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
              </label>
              <label>
                <input type="radio" name="stars" value="5" required />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
              </label>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col text-center">
            <button name="feed_but" type="submit" class="btn btn-primary mt-3">
              <div style="font-size: 1.5rem;">
              <i class="fa fa-lg fa-arrow-right"></i>  
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
  // $('#test-form').submit(function(e){
  //   e.preventDefault() ;
  //   alert("Thank you") ;
  // })
});
</script>
</main>
<footer>
  <em><h5 class="text-light text-center p-0 brand mt-2">
        <img src="assets/images/airtic.png" 
          height="40px" width="40px" alt="">				
      Online Flight Booking</h5></em>
  <p class="text-light text-center">&copy; <?php echo date('Y');?> - Developed By Berkane Sohaib , Bouberrima ilyes</p>
</footer>