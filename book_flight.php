<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); 
require 'helpers/init_conn_db.php';                      
?> 	
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
<style>
  body {
    background: #1a1a2e; 
    font-family: 'Montserrat', sans-serif;
  }
  
  @font-face {
    font-family: 'product sans';
    src: url('assets/css/Product Sans Bold.ttf');
  }
  
  h1 {
    font-family: 'product sans' !important;
    color: #00ff9d;
    font-size: 40px !important;
    margin-top: 20px;
    text-align: center;
  }
  
  table {
    background-color: rgba(22, 33, 62, 0.95) !important;
    border: 1px solid #4ecca3 !important;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  
  th {
    font-size: 18px;
    color: #4ecca3 !important;
    background-color: rgba(22, 33, 62) !important;
    padding: 15px !important;
    font-weight: 600 !important;
  }
  
  td {
    font-size: 16px;
    color: #e6e6e6 !important;
    padding: 12px !important;
  }
  
  tr:nth-child(even) {
    background-color: rgba(30, 45, 75, 0.95) !important;
  }
  
  tr:nth-child(odd) {
    background-color: rgba(22, 33, 62, 0.95) !important;
  }
  
  .container-table {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    background-color: rgba(22, 33, 62, 0.95) !important;
    padding: 20px;
    margin-top: 30px;
    border-radius: 10px;
    border: 1px solid #4ecca3;
  }
  
  .btn-success {
    background-color: #4ecca3 !important;
    border: none !important;
    transition: 0.5s all ease;
    color: #1a1a2e !important;
  }
  
  .btn-success:hover {
    background-color: #00ff9d !important;
    transform: translateY(-2px);
  }
  
  .alert-primary {
    background-color: #16213e !important;
    color: #4ecca3 !important;
    border: 1px solid #4ecca3 !important;
  }
  
  .alert-info {
    background-color: #2a466b !important;
    color: #4ecca3 !important;
    border: 1px solid #4ecca3 !important;
  }
  
  .alert-danger {
    background-color: #6b2a2a !important;
    color: #ff6b6b !important;
    border: 1px solid #ff6b6b !important;
  }
  
  .alert-success {
    background-color: #2a6b41 !important;
    color: #6bff6b !important;
    border: 1px solid #6bff6b !important;
  }
  
  footer {
    position: relative;
    bottom: 0;
    width: 100%;
    height: 2.5rem;
    background: #16213e;
    color: #4ecca3;
    border-top: 1px solid #4ecca3;
    margin-top: 50px;
  }
</style>
<main>
    <?php if(isset($_POST['search_but'])) { 
        $dep_date = $_POST['dep_date'];                        
        $ret_date = $_POST['ret_date'];  
        $dep_city = $_POST['dep_city'];  
        $arr_city = $_POST['arr_city'];     
        $type = $_POST['type'];
        $f_class = $_POST['f_class'];
        $passengers = $_POST['passengers'];
        if($dep_city === $arr_city){
          header('Location: index.php?error=sameval');
          exit();    
        }
        if($dep_city === '0') {
          header('Location: index.php?error=seldep');
          exit(); 
        }
        if($arr_city === '0') {
          header('Location: index.php?error=selarr');
          exit();              
        }
        ?>
      <div class="container mt-4">
        <h1 class="text-center">FLIGHTS FROM:<br><?php echo $dep_city; ?> to <?php echo $arr_city; ?></h1>
        <div class="container-table">
          <table class="table table-hover">
            <thead>
              <tr class="text-center">
                <th scope="col">Airline</th>
                <th scope="col">Departure</th>
                <th scope="col">Arrival</th>
                <th scope="col">Status</th>
                <th scope="col">Fare</th>
                <th scope="col">Book</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = 'SELECT * FROM Flight WHERE source=? AND Destination =? AND 
                  DATE(departure)=? ORDER BY Price';
              $stmt = mysqli_stmt_init($conn);
              mysqli_stmt_prepare($stmt,$sql);                
              mysqli_stmt_bind_param($stmt,'sss',$dep_city,$arr_city,$dep_date);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              while ($row = mysqli_fetch_assoc($result)) {
                $price = (int)$row['Price']*(int)$passengers;
                if($type === 'round') {
                  $price = $price*2;
                }
                if($f_class == 'B') {
                    $price += 0.5*$price;
                }
                if($row['status'] === '') {
                    $status = "Not yet Departed";
                    $alert = 'alert-primary';
                } else if($row['status'] === 'dep') {
                    $status = "Departed";
                    $alert = 'alert-info';
                } else if($row['status'] === 'issue') {
                    $status = "Delayed";
                    $alert = 'alert-danger';
                } else if($row['status'] === 'arr') {
                    $status = "Arrived";
                    $alert = 'alert-success';
                }                   
                echo "
                <tr class='text-center'>                  
                  <td>".$row['airline']."</td>
                  <td>".$row['departure']."</td>
                  <td>".$row['arrivale']."</td>
                  <td>
                    <div>
                        <div class='alert ".$alert." text-center mb-0 pt-1 pb-1' 
                            role='alert'>
                            ".$status."
                        </div>
                    </div>  
                  </td>                   
                  <td>$ ".$price."</td>
                  ";
                if(isset($_SESSION['userId']) && $row['status'] === '') {   
                  echo " <td>
                  <form action='pass_form.php' method='post'>
                  <input name='flight_id' type='hidden' value=".$row['flight_id'].">
                    <input name='type' type='hidden' value=".$type.">
                    <input name='passengers' type='hidden' value=".$passengers.">
                    <input name='price' type='hidden' value=".$price.">
                    <input name='ret_date' type='hidden' value=".$ret_date.">
                    <input name='class' type='hidden' value=".$f_class.">
                    <button name='book_but' type='submit' 
                    class='btn btn-success'>
                    <div>
                    <i class='fa fa-lg fa-check'></i>  
                    </div>
                  </button>
                  </form>
                  </td>                                                       
                  "; 
                } elseif (isset($_SESSION['userId']) && $row['status'] === 'dep') {
                  echo "<td><span class='text-light'>Not Available</span></td>";
                } else {
                  echo "<td><span class='text-light'>Login to continue</span></td>";
                }
                echo '</tr> ';                 
              }
              ?>
            </tbody>
          </table>
        </div>
        
        <div class="text-center mt-4">
          <a href="index.php" class="btn btn-info">
            <i class="fa fa-home"></i> Back to Home
          </a>
        </div>
      </div>
    <?php } ?>
</main>
<?php subview('footer.php'); ?> 
<footer>
  <em><h5 class="text-light text-center p-0 brand mt-2">
    <img src="assets/images/airtic.png" height="40px" width="40px" alt="">				
    Online Flight Booking</h5></em>
  <p class="text-light text-center">&copy; <?php echo date('Y');?> - Developed By Berkane Sohaib , Bouberrima ilyes</p>
</footer>