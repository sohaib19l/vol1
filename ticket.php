<?php include_once 'helpers/helper.php'; ?><!-- log on to codeastro.com for more projects -->
<?php subview('header.php'); ?>
<style>
body {
  background: #1a1a2e;  /* تغيير الخلفية لتكون مثل صفحة login */
  font-family: 'Montserrat', sans-serif;
}

@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}

h2.brand {
    font-size: 27px !important;
    color: #4ecca3;
}

.vl {
  border-left: 6px solid #4ecca3;
  height: 400px;
}

p.head {
    text-transform: uppercase;
    font-family: 'Montserrat', sans-serif;
    font-size: 17px;
    margin-bottom: 10px;
    color: #4ecca3;  
}

p.txt {
    text-transform: uppercase;
    font-family: 'Montserrat', sans-serif;
    font-size: 25px;
    font-weight: bolder;
    color: #e6e6e6;
}

.out {
    border-top-left-radius: 25px;
    border-bottom-left-radius: 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    background-color: rgba(22, 33, 62, 0.95) !important;
    padding-left: 25px;
    padding-right: 0px;
    padding-top: 20px;
    border: 1px solid #4ecca3;
    transition: all 0.3s ease;
}

.out:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
}

h2 {
    font-weight: lighter !important;
    font-size: 35px !important;
    margin-bottom: 20px;  
    font-family: 'product sans' !important;
    font-weight: bolder;
    color: #00ff9d;
}

.text-light2 {
    color: #d9d9d9;
}

h3 {
    font-size: 21px !important;
    margin-bottom: 20px;  
    font-family: Tahoma, sans-serif;
    font-weight: lighter;
    color: #e6e6e6;
}

h1 {
    font-weight: lighter !important;
    font-size: 45px !important;
    margin-bottom: 20px;  
    font-family: 'product sans' !important;
    font-weight: bolder;
    color: #00ff9d;
}

/* تحسين شكل الأزرار */
.btn-danger {
    background-color: #e74c3c !important;
    border-color: #e74c3c !important;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background-color: #c0392b !important;
    border-color: #c0392b !important;
    transform: translateY(-2px);
}

.btn-primary {
    background-color: #4ecca3 !important;
    border-color: #4ecca3 !important;
    color: #1a1a2e !important;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #00ff9d !important;
    border-color: #00ff9d !important;
    transform: translateY(-2px);
}

/* تحسين الجزء الأيمن من التذكرة */
.right-section {
    background-color: #376b8d !important;
    padding: 20px; 
    border-top-right-radius: 25px; 
    border-bottom-right-radius: 25px;
    border-right: 1px solid #4ecca3;
    border-top: 1px solid #4ecca3;
    border-bottom: 1px solid #4ecca3;
    transition: all 0.3s ease;
}

.right-section:hover {
    background-color: #2c5c7d !important;
}

/* تحسين صورة التذكرة */
.ticket-image {
    transition: all 0.5s ease;
}

.ticket-image:hover {
    transform: scale(1.1) rotate(5deg);
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
<main><!-- log on to codeastro.com for more projects -->
  <?php if(isset($_SESSION['userId'])) {   
    require 'helpers/init_conn_db.php';   
    
    if(isset($_POST['cancel_but'])) {
        $ticket_id = $_POST['ticket_id'];
        $stmt = mysqli_stmt_init($conn);
        $sql = 'SELECT * FROM Ticket WHERE ticket_id=?';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header('Location: ticket.php?error=sqlerror');
            exit();            
        } else {
            mysqli_stmt_bind_param($stmt,'i',$ticket_id);            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {   
              $sql_pas = 'DELETE FROM Passenger_profile WHERE passenger_id=? 
                ';
              $stmt_pas = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt_pas,$sql_pas)) {
                  header('Location: ticket.php?error=sqlerror');
                  exit();            
              } else {
                  mysqli_stmt_bind_param($stmt_pas,'i',$row['passenger_id']);            
                  mysqli_stmt_execute($stmt_pas);
                  $sql_t = 'DELETE FROM Ticket WHERE ticket_id=?';
                  $stmt_t = mysqli_stmt_init($conn);
                  if(!mysqli_stmt_prepare($stmt_t,$sql_t)) {
                      header('Location: ticket.php?error=sqlerror');
                      exit();            
                  } else {
                      mysqli_stmt_bind_param($stmt_t,'i',$row['ticket_id']);            
                      mysqli_stmt_execute($stmt_t);
                  }                  
              }              
            }
        }        
    }
    
    ?>     
    <div class="container mb-5"> 
    <h1 class="text-center mt-4 mb-4">E-TICKETS</h1>

      <?php 
      $stmt = mysqli_stmt_init($conn);
      $sql = 'SELECT * FROM Ticket WHERE user_id=?';
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)) {
          header('Location: ticket.php?error=sqlerror');
          exit();            
      } else {
          mysqli_stmt_bind_param($stmt,'i',$_SESSION['userId']);            
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          while ($row = mysqli_fetch_assoc($result)) {   
            $sql_p = 'SELECT * FROM Passenger_profile WHERE passenger_id=?';
            $stmt_p = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt_p,$sql_p)) {
                header('Location: ticket.php?error=sqlerror');
                exit();            
            } else {
                mysqli_stmt_bind_param($stmt_p,'i',$row['passenger_id']);            
                mysqli_stmt_execute($stmt_p);
                $result_p = mysqli_stmt_get_result($stmt_p);
                if($row_p = mysqli_fetch_assoc($result_p)) {
                  $sql_f = 'SELECT * FROM Flight WHERE flight_id=?';
                  $stmt_f = mysqli_stmt_init($conn);
                  if(!mysqli_stmt_prepare($stmt_f,$sql_f)) {
                      header('Location: ticket.php?error=sqlerror');
                      exit();            
                  } else {
                      mysqli_stmt_bind_param($stmt_f,'i',$row['flight_id']);            
                      mysqli_stmt_execute($stmt_f);
                      $result_f = mysqli_stmt_get_result($stmt_f);
                      if($row_f = mysqli_fetch_assoc($result_f)) {
                        $date_time_dep = $row_f['departure'];
                        $date_dep = substr($date_time_dep,0,10);
                        $time_dep = substr($date_time_dep,10,6) ;    
                        $date_time_arr = $row_f['arrivale'];
                        $date_arr = substr($date_time_arr,0,10);
                        $time_arr = substr($date_time_arr,10,6) ; 
                        if($row['class'] === 'E') {
                            $class_txt = 'ECONOMY';
                        } else if($row['class'] === 'B') {
                            $class_txt = 'BUSINESS';
                        }
                        echo '
                        <div class="row mb-5">                                                         
                        <div class="col-8 out">
                            <div class="row">                                                     
                                <div class="col">
                                    <h2 class="mb-0 brand">
                                        Online Flight Booking</h2> 
                                </div>
                                <div class="col">
                                    <h2 class="mb-0">'.$class_txt.' CLASS</h2>
                                </div>
                            </div>
                            <hr style="background-color: #4ecca3; height: 2px;">
                            <div class="row mb-3">  
                                <div class="col-4">
                                    <p class="head">Airline</p>
                                    <p class="txt">'.$row_f['airline'].'</p>
                                </div>            
                                <div class="col-4">
                                    <p class="head">from</p>
                                    <p class="txt">'.$row_f['source'].'</p>
                                </div>
                                <div class="col-4">
                                    <p class="head">to</p>
                                    <p class="txt">'.$row_f['Destination'].'</p>                
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <p class="head">Passenger</p>
                                    <p class="h5 text-uppercase" style="color: #00ff9d;">
                                    '.$row_p['f_name'].' '.$row_p['m_name'].' '.$row_p['l_name'].'
                                    </p>                              
                                </div>
                                <div class="col-4">
                                    <p class="head">board time</p>
                                    <p class="txt">12:45</p>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <p class="head">departure</p>
                                    <p class="txt mb-1">'.$date_dep.'</p>
                                    <p class="h1 font-weight-bold mb-3" style="color: #00ff9d;">'.$time_dep.'</p>  
                                </div>            
                                <div class="col-3">
                                    <p class="head">arrival</p>
                                    <p class="txt mb-1">'.$date_arr.'</p>
                                    <p class="h1 font-weight-bold mb-3" style="color: #00ff9d;">'.$time_arr.'</p>  
                                </div>
                                <div class="col-3">
                                    <p class="head">gate</p>
                                    <p class="txt">A22</p>
                                </div>            
                                <div class="col-3">
                                    <p class="head">seat</p>
                                    <p class="txt">'.$row['seat_no'].'</p>
                                </div>                
                            </div>                    
                        </div>
                        <div class="col-3 pl-0 right-section">
                            <div class="row">  
                                <div class="col">                                    
                                <h2 class="text-light text-center brand">
                                    Online Flight Booking</h2> 
                                </div>                                      
                            </div>                             
                            <div class="row justify-content-center">
                                <div class="col-12">                                    
                                    <img src="assets/images/airtic.png" class="mx-auto d-block ticket-image"
                                    height="200px" width="200px" alt="">
                                </div>                                
                            </div>
                            <div class="row">
                                <h3 class="text-light2 text-center mt-2 mb-0">
                                &nbsp Thank you for choosing us. </br> </br>
                                    Please be at the gate at boarding time</h3>   
                            </div>                            
                        </div>   
                        
                        <div class="col-1">
                            <div class="dropdown">
                                <button class="btn btn-danger dropdown-toggle" type="button" 
                                    id="dropdownMenuButton" data-toggle="dropdown" 
                                    aria-haspopup="true" aria-expanded="false">
                                    
                                    <i class="fa fa-ellipsis-v"></i> </td>
                                </button>  
                                <div class="dropdown-menu">
                                    <form class="px-4 py-3"  action="ticket.php" 
                                        method="post">
                                        <input type="hidden" name="ticket_id" 
                                            value='.$row['ticket_id'].'>
                                        <button class="btn btn-danger btn-sm"
                                            name="cancel_but">
                                            <i class="fa fa-trash"></i> &nbsp; Cancel Ticket</button>
                                    </form>
                                    <form class="px-4 py-3" action="e_ticket.php" target="_blank"
                                        method="post">
                                        <input type="hidden" name="ticket_id" 
                                            value='.$row['ticket_id'].'>
                                        <button class="btn w-100 mb-3 btn-primary btn-sm"
                                            name="print_but">
                                            <i class="fa fa-print"></i> &nbsp; Print Ticket</button>
                                    </form>                                    
                                </div>
                            </div>              
                        </div>                          
                        </div>                                               
                      ' ;
                      }
                  }                  
                }
            }                                    
          }
      }   
      
       ?> 

    </div>
  </main><!-- log on to codeastro.com for more projects -->
  <?php } ?>
  <?php subview('footer.php'); ?> 
<script>
// إضافة بعض تأثيرات الحركة عند تحميل الصفحة
$(document).ready(function() {
    $('.out').each(function(i) {
        $(this).delay(100 * i).animate({
            opacity: 1
        }, 500);
    });
    
    // تأثير تلاشي للعناصر
    $('.right-section').hover(
        function() {
            $(this).find('img').addClass('pulse');
        },
        function()