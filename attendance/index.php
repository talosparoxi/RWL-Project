<?php
/**
 * This page allows the user to enter their username and password to login to the system.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @author      Trevor Heffel
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.0
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-21
 */

// Include the attendance_script.php file
include('attendance_script.php');

// Include the header.php file
include('../header.php');
?>
<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Employee Attendance</h1>
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>                        
                <li class="active">Attendance</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        // If the user is not logged in, display a login form
        if ($loggedIn == true) {
        
        	echo '<form class="form-horizontal" name="breakForm" id="breakForm" method="post" action="index.php">
            	<h2 class="page-header">Punch Clock</h2>';
        	if ($attendanceId == 0) {
            	// load session with attendance id
            	$query = "SELECT attend_id, time_out FROM attendance WHERE attend_date='". $currentDate . "' AND emp_id = " . $empId;
            
            	// need to be able to handle more then one login for the day
            	$result = $db->query($query);
            	$numRows = $result->num_rows;
            	
            	if (!empty($numRows)) {
                	$row = $result->fetch_assoc();
                	$attendId = $row['attend_id'];
                	$punchOutSet = $row['time_out'];

                	if ($punchOutSet != '00:00:00') {                    
                    	$_SESSION['attendanceId'] = 0;
                	} else {
                		$_SESSION['attendanceId'] = $attendId;
                	}
            	}
            }

			if ($_SESSION['attendanceId'] == 0) {

            	echo '<div class="form-group">
                	<div class="col-md-offset-5 col-md-10">
                	    <input type="submit" class="btn btn-primary" name="punchIn" value="Punch In"/>
                	</div>
            	</div>';
        	} else {
            	echo ' <div class="form-group">
                	<div class="col-md-offset-5 col-md-10">
                    	<input type="submit" class="btn btn-primary" name="punchOut" value="Punch Out"/>
                	</div>
            	</div>
            
             	<h2 class="page-header">Job Selection</h2>';
            	for ($x = 0; $x < count($jobTypes); $x++) {
                	echo '<div class="form-group">
                        	<div class="col-md-offset-5 col-md-10">
                       	 	    <input type="submit" class="btn btn-primary" name="' .$jobTypes[$x][1] .'" value="' .$jobTypes[$x][0] .'"/>
                        	</div>
                    	</div>';
            	}
            
            	echo '<h2 class="page-header">Break</h2>
            		<div class="form-group">
                		<div class="col-md-offset-5 col-md-10">
                    		<input type="submit" class="btn btn-primary" name="startBreak" value="Start Break"/>
                		</div>
            		</div>
            		<div class="form-group">
                		<div class="col-md-offset-5 col-md-10">
                    		<input type="submit" class="btn btn-primary" name="endBreak" value="End Break"/>
                		</div>
            		</div>';
        	}
        	echo '</form>';
        } // If the user is logged in, redirect them to index.php if they try to access this page
        else {
            echo '<script type="text/javascript">location.replace("../index.php");</script>';
        }
        // Include the footer.php file
        include('../footer.php');
        ?>
    </div>
    <!-- /.container -->
        <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>