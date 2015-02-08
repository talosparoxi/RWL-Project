<?php
/**
 * Description for file goes here.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     x.xx
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-13
 */

// Start the session
session_start();

// Include php files
include('../database.php');
include('../header.php');
include('shipping_script.php');
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Shipping</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Shipping</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        $attendanceId = (!empty($_SESSION['attendanceId'])) ? $_SESSION['attendanceId'] : "";
        $potatoes = (!empty($_SESSION['potatoes'])) ? $_SESSION['potatoes'] : "";
        $farms = (!empty($_SESSION['farms'])) ? $_SESSION['farms'] : "";

        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $attendanceId =! 0 && $employeeType == 2) {
        ?>
        <h2 class="page-header">Add a Shipment</h2>
        <form class="form-horizontal" name="shipForm" id="shipForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Load Date</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="date" value="<?php echo $dateTime; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="potato" class="control-label col-md-2">Potato</label>
                <div class="col-md-10">
                    <select class="form-control" name="potato" id="potato">
                        <option value="" disabled selected style="display:none;"></option>
                        <?php
                        for ($x = 0; $x < count($potatoes); $x++){
                            echo '<option value="' . $potatoes[$x][0] .'">' . $potatoes[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="potProd" class="control-label col-md-2">Potato Producer</label>
                <div class="col-md-10">
                    <select class="form-control" id="farm" name="farm" onchange="warehouseFunction(this.value)">
                        <option value="" disabled selected style="display:none;"></option>
                        <?php
                        for ($x = 0; $x < count($farms); $x++){
                            echo '<option value="' . $farms[$x][0] .'">' . $farms[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="trailer" class="control-label col-md-2">Trailer</label>
                <div class="col-md-10">
                    <select class="form-control" name="trailer">
                        <?php
                        for ($x = 0; $x < count($trailers); $x++){
                            echo '<option value="' . $trailers[$x][0] .'">' . $trailers[$x][1] .'</option>';
                        }
                        ?>
                    </select>
                </div>             
            </div>            
            <div class="form-group">
                <label for="loadIDInfo" class="control-label col-md-2">RWL Ticket Number</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="loadIDInfo">
                </div>
            </div>
            <div class="form-group">
                <label for="weight" class="control-label col-md-2">Weight Shipped</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="weight">
                </div>
            </div>
            <div class="form-group">
                <label for="washed" class="control-label col-md-2">Washed</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="washed" value="Yes"> Yes</li>
                        <li><input type="radio" name="washed" value="No"> No</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="destination" class="control-label col-md-2">Destination</label>
                <div class="col-md-10">
                    <select class="form-control" id="destination">
                        <option value="cavendish1">Cavendish (Plant 1)</option>
                        <option value="cavendish2">Cavendish (Plant 2)</option>
                        <option value="processor">Processor</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
<!--            <div class="form-group">
                <label for="truckCleaned" class="control-label col-md-2">Truck Cleaned Upon Return</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="truckCleaned" value="Yes"> Yes</li>
                        <li><input type="radio" name="truckCleaned" value="No"> No</li>
                    </ul>
                </div>
            </div> -->
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>
        </form>
        <hr>
        <h2 class="page-header">View Shipments</h2>
        <p>There are currently no shipments to view.</p>
        <?php
        } else {
            echo "<h2>You do not have permission to view this page.</h2>";
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