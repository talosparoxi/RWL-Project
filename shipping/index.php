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

// Include the database.php file
include('../database.php');

// Include the header.php file
include('../header.php');
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
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $employeeType == 2) {
        ?>
        <h2 class="page-header">Add a Shipment</h2>
        <form class="form-horizontal" name="shipForm" id="shipForm" method="post" action="index.php">
            <div class="form-group">
                <label for="date" class="control-label col-md-2">Load Date</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="date" placeholder="MM-DD-YYYY">
                        </div>
                        <label for="time" class="control-label col-md-2">Load Time</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="time">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="potType" class="control-label col-md-2">Type of Potato</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="potType">
                </div>
            </div>
            <div class="form-group">
                <label for="potProd" class="control-label col-md-2">Potato Producer</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="potProd">
                </div>
            </div>
            <div class="form-group">
                <label for="loadIDInfo" class="control-label col-md-2">Load ID Info</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="loadIDInfo">
                </div>
            </div>
            <div class="form-group">
                <label for="quanShipped" class="control-label col-md-2">Quantity Shipped</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="quanShipped">
                </div>
            </div>
            <div class="form-group">
                <label for="weight" class="control-label col-md-2">Weight</label>
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
            <div class="form-group">
                <label for="truckCleaned" class="control-label col-md-2">Truck Cleaned Upon Return</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="truckCleaned" value="Yes"> Yes</li>
                        <li><input type="radio" name="truckCleaned" value="No"> No</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="accepted" class="control-label col-md-2">Accepted</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="accepted" value="Yes"> Yes</li>
                        <li><input type="radio" name="accepted" value="No"> No</li>
                    </ul>
                </div>
            </div>
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