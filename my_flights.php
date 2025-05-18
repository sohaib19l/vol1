<?php include_once 'helpers/helper.php'; ?>
<!-- log on to codeastro.com for more projects -->
<?php subview('header.php'); ?>
<?php if(isset($_SESSION['userId'])) {   
    require 'helpers/init_conn_db.php';                      
?> 
<style>
body {
  background: #1a1a2e;  /* تغيير الخلفية لتكون مثل صفحة login */
  font-family: 'Montserrat', sans-serif;
}

@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}

div.out {
    padding: 30px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
    border-top-left-radius: 20px;
    border-bottom-right-radius: 20px;
    background-color: rgba(22, 33, 62, 0.95) !important;
    border: 1px solid #4ecca3;
}

.city {
    font-size: 24px;
    color: #4ecca3;
    font-weight: bold;
}

p {
    margin-bottom: 10px;
    font-family: 'Montserrat', sans-serif;
    color: #e6e6e6;
}

.alert {
    font-weight: bold;
}

.date {
    font-size: 24px;
    color: #00ff9d;
}

.time {
    font-size: 27px;
    margin-bottom: 0px;
    color: #00ff9d;
}

.stat {
    font-size: 17px;
    color: #4ecca3;
}

h1 {
    font-weight: lighter !important;
    font-size: 45px !important;
    margin-bottom: 20px;  
    font-family: 'product sans' !important;
    font-weight: bolder;
    color: #00ff9d;
  }

.row {
    background-color: transparent;
}

.status-container {
    padding: 10px;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.status-icon {
    font-size: 2.5em;
    margin-bottom: 10px;
}

/* تحسين شكل أيقونات الطائرة */
.fa-fighter-jet {
    transform: scale(1.2);
    transition: all 0.3s ease;
}

/* تحسين شكل خط المسار */
hr {
    height: 3px;
    border-radius: 2px;
}

/* إضافة تأثيرات حركية */
.row.out:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
    transition: all 0.3s ease;
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
    <div class="container">
    <h1 class="text-center mt-4 mb-4">FLIGHT STATUS</h1>
    <?php 
    $stmt_t = mysqli_stmt_init($conn);
    $sql_t = 'SELECT * FROM Ticket WHERE user_id=?';
    $stmt_t = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt_t,$sql_t)) {
        header('Location: ticket.php?error=sqlerror');
        exit();            
    } else {
        mysqli_stmt_bind_param($stmt_t,'i',$_SESSION['userId']);            
        mysqli_stmt_execute($stmt_t);
        $result_t = mysqli_stmt_get_result($stmt_t);
        while($row_t = mysqli_fetch_assoc($result_t)) {     
            $stmt = mysqli_stmt_init($conn);
            $sql = 'SELECT * FROM Passenger_profile WHERE passenger_id=?';
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)) {
                header('Location: my_flights.php?error=sqlerror');
                exit();            
            } else {
                mysqli_stmt_bind_param($stmt,'i',$row_t['passenger_id']);            
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $sql_f = 'SELECT * FROM Flight WHERE flight_id=? ';
                    $stmt_f = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt_f,$sql_f)) {
                        header('Location: my_flights.php?error=sqlerror');
                        exit();            
                    } else {
                        mysqli_stmt_bind_param($stmt_f,'i',$row_t['flight_id']);            
                        mysqli_stmt_execute($stmt_f);
                        $result_f = mysqli_stmt_get_result($stmt_f);
                        if($row_f = mysqli_fetch_assoc($result_f)) {
                            $date_time_dep = $row_f['departure'];
                            $date_dep = substr($date_time_dep,0,10);
                            $time_dep = substr($date_time_dep,10,6) ;    
                            $date_time_arr = $row_f['arrivale'];
                            $date_arr = substr($date_time_arr,0,10);
                            $time_arr = substr($date_time_arr,10,6) ;      
                            if($row_f['status'] === '') {
                                $status = "Not yet Departed";
                                $alert = 'alert-primary';
                                $statusClass = 'text-primary';
                                $iconClass = 'fa-clock-o';
                            } else if($row_f['status'] === 'dep') {
                                $status = "Departed";
                                $alert = 'alert-info';
                                $statusClass = 'text-info';
                                $iconClass = 'fa-plane';
                            } else if($row_f['status'] === 'issue') {
                                $status = "Delayed";
                                $alert = 'alert-danger';
                                $statusClass = 'text-danger';
                                $iconClass = 'fa-exclamation-triangle';
                            } else if($row_f['status'] === 'arr') {
                                $status = "Arrived";
                                $alert = 'alert-success';
                                $statusClass = 'text-success';
                                $iconClass = 'fa-check-circle';
                            }                           
                            echo '
                            <div class="row out mb-5 ">
                                <div class="col-md-4 order-lg-3 order-md-1"> ';    
                                if($row_f['status'] === 'arr') {
                                    echo '
                                    <div class="row">
                                        <div class="col-1 p-0 m-0">
                                            <i class="fa fa-circle mt-4 text-success"
                                                style="float: right;"></i>
                                        </div>                            
                                        <div class="col-10 p-0 m-0 mt-3" style="float: right;">
                                            <hr class="bg-success">
                                        </div>                            
                                        <div class="col-1 p-0 m-0">
                                            <i class="fa fa-2x fa-fighter-jet mt-3 text-success"
                                                ></i>
                                        </div>                                    
                                    </div>                            
                                    ';
                                } else {
                                    echo '
                                    <div class="row">
                                        <div class="col-1 p-0 m-0">
                                            <i class="fa fa-2x fa-fighter-jet mt-3 text-success"
                                                style="float: right;"></i>
                                        </div>
                                        <div class="col-10 p-0 m-0 mt-3" style="float: right;">
                                            <hr style="background-color: #4ecca3;">
                                        </div>   
                                        <div class="col-1 p-0 m-0">
                                            <i class="fa fa-circle mt-4"
                                                style="color: #4ecca3;"></i>
                                        </div>                             
                                    </div>                            
                                    ';
                                }                     
                                    echo '
                                </div>
                        
                                <div class="col-md-3 col-6 order-md-2 pl-0 text-center 
                                    order-lg-2 card-dep">
                                    <p class="city">'.$row_f['source'].'</p>
                                    <p class="stat">Scheduled Departure:</p>
                                    <p class="date">'.$date_dep.'</p>                
                                    <p class="time">'.$time_dep.'</p>
                                </div>        
                                <div class="col-md-3 col-6 order-md-4 pr-0 text-center 
                                    order-lg-4 card-arr" 
                                    style="float: right;">
                                    <p class="city">'.$row_f['Destination'].'</p>
                                    <p class="stat">Scheduled Arrival:</p>
                                    <p class="date">'.$date_arr.'</p>                
                                    <p class="time">'.$time_arr.'</p>          
                                </div>
                                <div class="col-lg-2 order-md-12">
                                    <div class="status-container text-center">
                                        <i class="fa '.$iconClass.' status-icon '.$statusClass.'"></i>
                                        <div class="alert '.$alert.' text-center" role="alert">
                                            '.$status.'
                                        </div>
                                    </div>
                                </div>          
                            </div> ';                     
                        }
                    }            
                }
            }    
        }
    }
    ?>    
</div>

</main>     
<?php } ?>
<?php subview('footer.php'); ?>