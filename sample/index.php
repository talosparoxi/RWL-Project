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
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-16
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
                <h1 class="page-header">Sample</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active">Sample</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $loggedIn = (!empty($_SESSION['loggedIn'])) ? $_SESSION['loggedIn'] : "";
        $employeeType = (!empty($_SESSION['employeeType'])) ? $_SESSION['employeeType'] : "";
        // If the user is logged in with the correct employee permissions
        if ($loggedIn == true && $employeeType == 4) {
        ?>
        <h2 class="page-header">Add a Sample</h2>

        <form class="form-horizontal" name="sampleForm" id="sampleForm" method="post" action="index.php">

            <div class="form-group">
                <label for="trailer" class="control-label col-md-2">Trailer #</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="trailer">
                </div>
            </div>

            <div class="form-group">
                <label for="incomingOutgoing" class="control-label col-md-2">Incoming / Outgoing</label>
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><input type="radio" name="incomingOutgoing" value="Incoming"> Incoming</li>
                        <li><input type="radio" name="incomingOutgoing" value="Outgoing"> Outgoing</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="toteSample" class="control-label col-md-2">Tote / Sample #</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="toteSample">
                </div>
            </div>

            <div class="form-group">
                <label for="date" class="control-label col-md-2">Date</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="date" placeholder="MM-DD-YYYY">
                        </div>
                        <label for="time" class="control-label col-md-2">Time</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="time">
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label for="totalWeight" class="control-label col-md-2">Total Sample Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="totalWeight">
                </div>
            </div>

            <div class="form-group">
                <label for="unusable" class="control-label col-md-2">Unusable</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="useableWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="useableWeight">
                        </div>
                        <label for="useablePercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="useablePercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="rot" class="control-label col-md-2">Rot</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="rotWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="rotWeight">
                        </div>
                        <label for="rotPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="rotPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="internal" class="control-label col-md-2">Internal</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="internalWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="internalWeight">
                        </div>
                        <label for="internalPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="internalPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="pitRot" class="control-label col-md-2">Pit Rot</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="pitRotWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="pitRotWeight" placeholder="">
                        </div>
                        <label for="pitRotPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="pitRotPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="wireworm" class="control-label col-md-2">Wireworm</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="wirewormWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="wirewormWeight" placeholder="">
                        </div>
                        <label for="wirewormPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="wirewormPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="jellyEnd" class="control-label col-md-2">Jelly End</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="jellyEndWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="jellyEndWeight" placeholder="">
                        </div>
                        <label for="jellyEndPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="jellyEndPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="other" class="control-label col-md-2">Other</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="otherWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="otherWeight" placeholder="">
                        </div>
                        <label for="otherPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="otherPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="hollowHeart" class="control-label col-md-2">Hollow Heart</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="hollowHeartWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="hollowHeartWeight" placeholder="">
                        </div>
                        <label for="hollowHeartPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="hollowHeartPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="scab" class="control-label col-md-2">Scab</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="scabWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="scabWeight" placeholder="">
                        </div>
                        <label for="scabPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="scabPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="sunburn" class="control-label col-md-2">Sunburn</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="sunburnWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="sunburnWeight" placeholder="">
                        </div>
                        <label for="sunburnPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="sunburnPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="mechBruise" class="control-label col-md-2">Mech Bruise</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="mechBruiseWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="mechBruiseWeight" placeholder="">
                        </div>
                        <label for="mechBruisePercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="mechBruisePercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="smalls" class="control-label col-md-2">Smalls</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="smallsWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="smallsWeight" placeholder="">
                        </div>
                        <label for="smallsPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="smallsPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="10oz" class="control-label col-md-2">10oz</label>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="10ozWeight" class="col-md-1 control-label">Weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="10ozsWeight" placeholder="">
                        </div>
                        <label for="10ozPercent" class="col-md-1 control-label">Percent</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="10ozPercent" placeholder="%" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="airWeight" class="control-label col-md-2">Air Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="airWeight" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="waterWeight" class="control-label col-md-2">Water Weight</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="waterWeight" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="rockMaterial" class="control-label col-md-2">Rock & Foreign Material</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="rockMaterial" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                </div>
            </div>

        </form>

        <hr>

        <h2 class="page-header">View Samples</h2>
        <p>There are currently no samples to view.</p>

        <?php
        }
        else {
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