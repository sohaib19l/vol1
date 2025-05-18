<?php include_once 'header.php'; 
require '../helpers/init_conn_db.php';

// تفعيل عرض الأخطاء
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!-- log on to codeastro.com for more projects -->
<link rel="stylesheet" href="../assets/css/admin.css">
<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300&family=Poiret+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
<style><!-- log on to codeastro.com for more projects -->
  body {
    /* background-color: #B0E2FF; */
    background-color: #f8f9fa;
  }
  td {
    /* font-family: 'Assistant', sans-serif !important; */
    font-size: 18px !important;
  }
  p {
  font-size: 35px;
  font-weight: 100;
  font-family: 'product sans';  
  }  

  .main-section{
	padding: 25px;
	margin-top: 20px;
}
.dashbord{
	width:23%;
	display: inline-block;
	margin: 10px;
	padding: 25px;
	border-radius: 12px;
	background: white;
	box-shadow: 0 2px 15px rgba(0,0,0,0.05);
	transition: all 0.3s ease;
	border: 1px solid rgba(0,0,0,0.05);
}
.dashbord:hover {
	transform: translateY(-5px);
	box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}
.icon-section {
	text-align: center;
	color: #444;
}
.icon-section i{
	font-size: 32px;
	background: linear-gradient(45deg, #6c5ce7, #a55eea);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	margin: 10px 0;
}
.icon-section h4 {
	font-size: 16px;
	color: #666;
	margin: 10px 0;
	font-weight: 500;
}
.icon-section p{
	font-size: 28px;
	font-weight: 600;
	margin: 10px 0;
	color: #2d3436;
}
.detail-section{
	background-color: #2F4254;
	padding: 5px 0px;
}
.dashbord .detail-section:hover{
	background-color: #5a5a5a;
	cursor: pointer;
}
.detail-section a{
	color:#fff;
	text-decoration: none;
}
.dashbord-green .icon-section,.dashbord-green .icon-section i{
	background-color: #16A085;
}
.dashbord-green .detail-section{
	background-color: #149077;
}

.dashbord-blue .icon-section,.dashbord-blue .icon-section i{
	background-color: #2980B9;
}
.dashbord-blue .detail-section{
	background-color:#2573A6;
}
.dashbord-red .icon-section,.dashbord-red .icon-section i{
	background-color:#E74C3C;
}
.dashbord-red .detail-section{
	background-color:#CF4436;
}

.table {
	margin-top: 20px;
	background: white;
	border-radius: 8px;
	overflow: hidden;
}

.card {
	margin-bottom: 25px;
	border-radius: 8px;
	box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
  
</style>
    <main><!-- log on to codeastro.com for more projects -->
        <?php if(isset($_SESSION['adminId'])) { ?>
          <div class="container">

            <div class="main-section">
              <div class="dashbord">
                <div class="icon-section">
                  <i class="fa fa-users"></i>
                  <h4>Total Passengers</h4>
                  <p><?php include 'psngrcnt.php';?></p>
                </div>
               
              </div>
              <div class="dashbord revenue">
                <div class="icon-section">
                  <i class="fa fa-money"></i>
                  <h4>Revenue</h4>
                  <p>$4,710</p>
                </div>
               
              </div>
              <div class="dashbord flights">
                <div class="icon-section">
                  <i class="fa fa-plane"></i>
                  <h4>Active Flights</h4>
                  <p><?php include 'flightscnt.php';?></p>
                </div>
               
              </div>  
              <div class="dashbord airlines">
                <div class="icon-section">
                  <i class="fa fa-building"></i>
                  <h4>Airlines</h4>
                  <p><?php include 'airlcnt.php';?></p>
                </div>
               
              </div>  
              
            </div>

			<!-- log on to codeastro.com for more projects -->
          <div class="card mt-4" id="flight">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title">Today's Flights</h5>
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown">
            <i class="fa fa-filter"></i> Filter
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#flight">All Flights</a>
            <a class="dropdown-item" href="#issue">Active Flights</a>
            <a class="dropdown-item" href="#dep">Departed</a>
            <a class="dropdown-item" href="#arr">Arrived</a>
          </div>
        </div>
      </div>
      
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
          <thead>
            <tr><!-- log on to codeastro.com for more projects -->
              <th>Flight No.</th>
              <th>Departure</th>
              <th>Arrival</th>
              <th>Destination</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>     <!-- log on to codeastro.com for more projects -->         
              <?php
                $sql = "SELECT f.*, a.name as airline_name 
                       FROM Flight f 
                       LEFT JOIN airline a ON f.airline = a.airline_id 
                       ORDER BY f.departure DESC";
                $result = mysqli_query($conn, $sql);
                
                if (!$result) {
                    echo '<tr><td colspan="7" class="text-danger">Error: ' . mysqli_error($conn) . '</td></tr>';
                } else if (mysqli_num_rows($result) == 0) {
                    echo '<tr><td colspan="7" class="text-center">No flights found</td></tr>';
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                            <td>' . $row['flight_id'] . '</td>
                            <td>' . $row['departure'] . '</td>
                            <td>' . $row['arrivale'] . '</td>
                            <td>' . $row['Destination'] . '</td>
                            <td><span class="badge badge-success">On Time</span></td>
                            <td>
                                <div class="btn-group">
                                    <a href="edit_flight.php?id=' . $row['flight_id'] . '" 
                                       class="btn btn-primary">Edit</a>
                                    <a href="view_passengers.php?flight_id=' . $row['flight_id'] . '" 
                                       class="btn btn-info">Details</a>
                                </div>
                            </td>
                        </tr>';
                    }
                }
                ?>
          </tbody>
        </table>        
      
      </div>
    </div>

    <div class="card" id="issue">
      <div class="card-body">
          <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button><!-- log on to codeastro.com for more projects -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Today's flight</a>
              <a class="dropdown-item" href="#issue">Today's flight issues</a>
              <a class="dropdown-item" href="#dep">Flights departed today</a>
              <a class="dropdown-item" href="#arr">Flights arrived today</a>
            </div>
          </div>        
        <p class="text-secondary">Today's Flight Issues</p>
        <table class="table-sm table table-hover">
        <thead class="thead-dark">
            <tr><!-- log on to codeastro.com for more projects -->
              <th scope="col">#</th>
              <th scope="col">Arrival</th>
              <th scope="col">Departure</th>
              <th scope="col">Destination</th>
              <th scope="col">Source</th>
              <th scope="col">Airline</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
              <?php
                $curr_date = (string)date('y-m-d');
                $curr_date = '20'.$curr_date;
                $sql = "SELECT * FROM Flight WHERE DATE(departure)=?";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt,$sql);
                mysqli_stmt_bind_param($stmt,'s',$curr_date);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                  if($row['status']=='issue') {
                    echo '              
                <td scope="row">
                  <a href="pass_list.php?flight_id='.$row['flight_id'].'">
                  '.$row['flight_id'].' </a> </td>
                <td>'.$row['arrivale'].'</td>
                <td>'.$row['departure'].'</td>
                <td>'.$row['Destination'].'</td>
                <td>'.$row['source'].'</td>
                <td>'.$row['airline'].'</td> 
                <th class="options">
                  <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" 
                      id="dropdownMenuButton" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                      
                      <i class="fa fa-ellipsis-v"></i> </td>
                    </button>  
                    <div class="dropdown-menu">
                      <form class="px-4 py-3"  action="../includes/admin/admin.inc.php" method="post">
                        <input type="hidden" type="number" name="flight_id" 
                          value='.$row['flight_id'].'>  
                        <button type="submit" name="issue_soved_but" 
                          class="btn btn-danger btn-sm">Issue Solved!</button>
                      </form>
                    </div>
                  </div>  
                </th>                
              </tr> ' ; }} ?>
          </tbody>
        </table>        
      
      </div>
    </div> 

    <div class="card" id="dep">
      <div class="card-body">
          <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button><!-- log on to codeastro.com for more projects -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Today's flight</a>
              <a class="dropdown-item" href="#issue">Today's flight issues</a>
              <a class="dropdown-item" href="#dep">Flights departed today</a>
              <a class="dropdown-item" href="#arr">Flights arrived today</a>
            </div>
          </div>        
        <p class=" text-secondary">Flights Departed Today</p>
        <table class="table-sm table table-hover">
        <thead class="thead-dark">
            <tr><!-- log on to codeastro.com for more projects -->
              <th scope="col">#</th>
              <th scope="col">Arrival</th>
              <th scope="col">Departure</th>
              <th scope="col">Destination</th>
              <th scope="col">Source</th>
              <th scope="col">Airline</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
              <?php
                $curr_date = (string)date('y-m-d');
                $curr_date = '20'.$curr_date;
                $sql = "SELECT * FROM Flight WHERE DATE(departure)=?";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt,$sql);
                mysqli_stmt_bind_param($stmt,'s',$curr_date);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                  if($row['status']=='dep') {
                    echo '              
                <td scope="row">
                  <a href="pass_list.php?flight_id='.$row['flight_id'].'">
                  '.$row['flight_id'].' </a> </td>
                <td>'.$row['arrivale'].'</td>
                <td>'.$row['departure'].'</td>
                <td>'.$row['Destination'].'</td>
                <td>'.$row['source'].'</td>
                <td>'.$row['airline'].'</td> 
                <th class="options">
                  <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" 
                      id="dropdownMenuButton" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                      
                      <i class="fa fa-ellipsis-v"></i> </td>
                    </button>  
                    <div class="dropdown-menu">
                      <form class="px-4 py-3"  action="../includes/admin/admin.inc.php" method="post">
                        <input type="hidden" type="number" name="flight_id" 
                          value='.$row['flight_id'].'>  
                        <button type="submit" name="arr_but" 
                          class="btn btn-danger">Arrived</button>
                      </form>
                    </div>
                  </div>  
                </th>                
              </tr> ' ; }} ?>
          </tbody>
        </table>        
      
      </div>
    </div>       

    <div class="card mb-4" id="arr">
      <div class="card-body">
        <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button><!-- log on to codeastro.com for more projects -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Today's flight</a>
              <a class="dropdown-item" href="#issue">Today's flight issues</a>
              <a class="dropdown-item" href="#dep">Flights departed today</a>
              <a class="dropdown-item" href="#arr">Flights arrived today</a>
            </div>
          </div>        
        <p class=" text-secondary">Flights Arrived Today</p>
        <table class="table-sm table table-hover">
        <thead class="thead-dark">
            <tr><!-- log on to codeastro.com for more projects -->
              <th scope="col">#</th>
              <th scope="col">Arrival</th>
              <th scope="col">Departure</th>
              <th scope="col">Destination</th>
              <th scope="col">Source</th>
              <th scope="col">Airline</th>
            </tr>
          </thead>
          <tbody>
              <tr>
              <?php
                $curr_date = (string)date('y-m-d');
                $curr_date = '20'.$curr_date;
                $sql = "SELECT * FROM Flight WHERE DATE(departure)=?";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt,$sql);
                mysqli_stmt_bind_param($stmt,'s',$curr_date);
                mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  while ($row = mysqli_fetch_assoc($result)) {
                  if($row['status']=='arr') {
                    echo '              
                <td scope="row">
                  <a href="pass_list.php?flight_id='.$row['flight_id'].'">
                  '.$row['flight_id'].' </a> </td>
                <td>'.$row['arrivale'].'</td>
                <td>'.$row['departure'].'</td>
                <td>'.$row['Destination'].'</td>
                <td>'.$row['source'].'</td>
                <td>'.$row['airline'].'</td>                
              </tr> ' ; }} ?>
          </tbody>
        </table>        
      
      </div>
    </div>      
  </div>
<?php } else {
    echo '<div class="container mt-4"><div class="alert alert-danger">Please login first</div></div>';
} ?>
    </main>
    <?php include_once 'footer.php'; ?>
