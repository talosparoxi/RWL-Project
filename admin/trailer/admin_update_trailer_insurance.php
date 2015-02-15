<?php
/**
 * This page holds the form for updating a trailers insurance.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Taylor Hardy
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     x.xx
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-02-04
 */

// Start the session
session_start();

//set path to include files
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/RWL-Project";
// Include the database.php file
include($path.'/database.php');

// Include the header.php file
include($path.'/header.php');
?>

<html>
	<body>
		    <!-- Page Content -->
		<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">trailer insurance Update</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/trailer/admin_trailer_list.php">trailers</a>
                    </li>
                    <li class="active">Update</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add trailer form
			if ($loggedIn == true) {
				// Get Farm Id
				$trailerId = $_GET["id"];	
						// Create query
				$query = "select `ins_expiry_date`, `img_id` from `insurance` where trailer_Id = {$trailerId}";
					
				$result = $db->query($query);
				
				if ($result->num_rows > 0) {
					$queryValues = $result->fetch_assoc();
					$insExpiry = $queryValues['ins_expiry_date'];
					$imgId = $queryValues['img_id'];

			?>

				<form class="form-horizontal" name="updatetrailerForm" id="updatetrailerForm" method="post" action="<?php echo ROOT; ?>/admin/admin_update_database.php">

					<!--trailer Id-->
					<input hidden type = "radio" name = "trailerId" id = "trailerId" value = "<?php echo $trailerId; ?>" checked>

				<!--insurance-->
					<!--insurance expirey-->
					<div class="form-group">
						<label for="inputinsuranceExpiry" class="control-label col-xs-2">insurance Expirey</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="insExpiry" id="insExpiry" placeholder="YYYY-MM-DD" value = "<?php echo $insExpiry; ?>" required data-validation-required-message="Please enter the designated insurance expirey date.">
						</div>
					</div>
			<?php
								
					$queryImg = "select `img` from `images` where img_id = {$imgId}";
					$resultImg = $db->query($queryImg);
				
					if ($resultImg->num_rows > 0) {
						$queryValuesImg = $result->fetch_assoc();
						$insImg = $queryValuesImg['img'];

					?>
					<!--insurance image-->
					<div class="form-group">
						<label for="inputinsuranceImg" class="control-label col-md-2">insurance Picture</label>
						<div class="col-md-10">
							<input type="file" id="insImg" name="insImg" accept="image/*" value = "<?php echo $insImg; ?>" required data-validation-required-message="Please enter the designated insurance expirey date.">
						</div>
					</div>
						<?php
								
					}
					else{
						echo "No image found";
						?>
						<!--insurance image-->
					<div class="form-group">
						<label for="inputinsuranceImg" class="control-label col-md-2">insurance Picture</label>
						<div class="col-md-10">
							<input type="file" id="insImg" name="insImg" accept="image/*" required data-validation-required-message="Please enter the designated insurance expirey date.">
						</div>
					</div>
						<?php
					}

					?>
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<input type="submit" class="btn btn-primary" name="updatetrailer" value="Update insurance"/>
						</div>
					</div>
					
				</form>

<?php

				}
				else{
					echo "failed query";
				}
			}
			
			// If the user is not logged in, redirect them to login.php if they try to access this page
			else {
				echo '<script type="text/javascript">
							location.replace("'.ROOT.'/login/index.php");
							</script>';
			}
        ?>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; RWL Holdings 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>