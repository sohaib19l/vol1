<?php include_once 'header.php'; ?>
<?php include_once 'footer.php';
require '../helpers/init_conn_db.php';?>

<?php
if(!isset($_SESSION['adminId'])) {
    header("Location: ../login.php");
    exit();
}

$flight_id = "";
$arrival = "";
$departure = "";
$source = "";
$destination = "";
$airline = "";
$seats = "";
$price = "";
$success_message = "";
$error_message = "";

if(isset($_GET['flight_id'])) {
    $flight_id = $_GET['flight_id'];
    
    $sql = "SELECT * FROM Flight WHERE flight_id = ?";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        $error_message = "Database error. Please try again.";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $flight_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if($row = mysqli_fetch_assoc($result)) {
            $arrival = $row['arrivale'];
            $departure = $row['departure'];
            $source = $row['source'];
            $destination = $row['Destination'];
            $airline = $row['airline'];
            $seats = $row['Seats'];
            $price = $row['Price'];
        } else {
            $error_message = "Flight not found.";
        }
    }
}

if(isset($_POST['edit_flight_time'])) {
    $flight_id = $_POST['flight_id'];
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    
    // Validate inputs
    $errors = array();
    
    if(empty($arrival)) {
        $errors[] = "Arrival time is required";
    }
    
    if(empty($departure)) {
        $errors[] = "Departure time is required";
    }
    
    if(empty($source)) {
        $errors[] = "Source is required";
    }
    
    if(empty($destination)) {
        $errors[] = "Destination is required";
    }
    
    if(strtotime($arrival) <= strtotime($departure)) {
        $errors[] = "Arrival time must be after departure time";
    }
    
    if(count($errors) == 0) {
        $sql = "UPDATE Flight SET arrivale = ?, departure = ?, source = ?, Destination = ? WHERE flight_id = ?";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            $error_message = "Database error. Please try again.";
        } else {
            mysqli_stmt_bind_param($stmt, "ssssi", $arrival, $departure, $source, $destination, $flight_id);
            
            if(mysqli_stmt_execute($stmt)) {
                $success_message = "Flight time and location updated successfully!";
                
                // Log the update
                $admin_id = $_SESSION['adminId'];
                $log_sql = "INSERT INTO admin_logs (admin_id, action, flight_id, timestamp) VALUES (?, 'updated flight time/location', ?, NOW())";
                $log_stmt = mysqli_stmt_init($conn);
                if(mysqli_stmt_prepare($log_stmt, $log_sql)) {
                    mysqli_stmt_bind_param($log_stmt, "ii", $admin_id, $flight_id);
                    mysqli_stmt_execute($log_stmt);
                }
                
                // Refresh the data
                $sql = "SELECT * FROM Flight WHERE flight_id = ?";
                $stmt = mysqli_stmt_init($conn);
                
                if(mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "i", $flight_id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if($row = mysqli_fetch_assoc($result)) {
                        $arrival = $row['arrivale'];
                        $departure = $row['departure'];
                        $source = $row['source'];
                        $destination = $row['Destination'];
                        $airline = $row['airline'];
                        $seats = $row['Seats'];
                        $price = $row['Price'];
                    }
                }
            } else {
                $error_message = "Failed to update flight details.";
            }
        }
    } else {
        $error_message = implode("<br>", $errors);
    }
}
?>

<style>
body {
    background-color: #f5f5f5;
}
.card {
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    border-radius: 15px;
    border: none;
    overflow: hidden;
}
.card-header {
    background: linear-gradient(135deg, #0062E6, #33AEFF);
    color: white;
    border-bottom: none;
    padding: 20px;
}
h1 {
    font-family: 'product sans', Arial, sans-serif;
    font-size: 36px !important;
    font-weight: 500;
    margin: 0;
    letter-spacing: 1px;
}
.form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 12px 15px;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
}
.form-control:focus {
    border-color: #4A90E2;
    box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
    background-color: #fff;
}
.form-group label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 8px;
}
.btn-primary {
    background: linear-gradient(135deg, #0062E6, #33AEFF);
    border: none;
    padding: 12px 20px;
    font-weight: 600;
    border-radius: 5px;
    transition: all 0.3s ease;
}
.btn-primary:hover {
    background: linear-gradient(135deg, #005dd5, #2b95e6);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.btn-secondary {
    background-color: #6c757d;
    border: none;
    padding: 12px 20px;
    font-weight: 600;
    border-radius: 5px;
    transition: all 0.3s ease;
}
.btn-secondary:hover {
    background-color: #5a6268;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.alert {
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 20px;
}
.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}
.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}
.flight-details {
    background-color: #f8f9fa;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 20px;
}
.flight-details p {
    margin-bottom: 5px;
}
.flight-details strong {
    color: #495057;
}
.col-form-label {
    font-weight: 600;
}
.input-group-text {
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    border-radius: 5px 0 0 5px;
}
.form-text {
    color: #6c757d;
    font-size: 0.85rem;
}
</style>

<main>
    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Edit Flight Time & Location</h1>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($error_message)): ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="fa fa-exclamation-triangle mr-2"></i> <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if(!empty($success_message)): ?>
                            <div class="alert alert-success" role="alert">
                                <i class="fa fa-check-circle mr-2"></i> <?php echo $success_message; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if(!empty($flight_id)): ?>
                            <div class="flight-details mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Flight ID:</strong> <?php echo $flight_id; ?></p>
                                        <p><strong>Airline:</strong> <?php echo $airline; ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Seats:</strong> <?php echo $seats; ?></p>
                                        <p><strong>Price:</strong> $<?php echo $price; ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <form method="post" action="" class="needs-validation" novalidate>
                                <input type="hidden" name="flight_id" value="<?php echo $flight_id; ?>">
                                
                                <div class="form-group row mb-4">
                                    <label for="departure" class="col-sm-3 col-form-label">Departure Time:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-plane-departure"></i></span>
                                            </div>
                                            <input type="datetime-local" class="form-control" id="departure" name="departure" value="<?php echo date('Y-m-d\TH:i', strtotime($departure)); ?>" required>
                                        </div>
                                        <small class="form-text text-muted">Format: YYYY-MM-DD HH:MM</small>
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label for="arrival" class="col-sm-3 col-form-label">Arrival Time:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-plane-arrival"></i></span>
                                            </div>
                                            <input type="datetime-local" class="form-control" id="arrival" name="arrival" value="<?php echo date('Y-m-d\TH:i', strtotime($arrival)); ?>" required>
                                        </div>
                                        <small class="form-text text-muted">Arrival must be after departure</small>
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label for="source" class="col-sm-3 col-form-label">Source:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="source" name="source" value="<?php echo $source; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label for="destination" class="col-sm-3 col-form-label">Destination:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="destination" name="destination" value="<?php echo $destination; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-5">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" name="edit_flight_time" class="btn btn-primary mr-2">
                                            <i class="fa fa-save mr-1"></i> Save Changes
                                        </button>
                                        <a href="all_flights.php" class="btn btn-secondary">
                                            <i class="fa fa-times mr-1"></i> Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="alert alert-warning" role="alert">
                                <i class="fa fa-exclamation-circle mr-2"></i> No flight selected for editing.
                                <a href="all_flights.php" class="alert-link">Go back to flight list</a>.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Check if arrival is after departure
document.getElementById('arrival').addEventListener('change', function() {
    var departure = new Date(document.getElementById('departure').value);
    var arrival = new Date(this.value);
    
    if(arrival <= departure) {
        this.setCustomValidity('Arrival time must be after departure time');
    } else {
        this.setCustomValidity('');
    }
});

document.getElementById('departure').addEventListener('change', function() {
    var departure = new Date(this.value);
    var arrival = new Date(document.getElementById('arrival').value);
    
    if(arrival <= departure && document.getElementById('arrival').value !== '') {
        document.getElementById('arrival').setCustomValidity('Arrival time must be after departure time');
    } else {
        document.getElementById('arrival').setCustomValidity('');
    }
});
</script>