<?php
//created by: Taylor Hardy
//created on: 2015/01/15
//version 0.9

// Start the session
session_start();

// Include the database.php file
include('database.php');

// Include the header.php file
include('header.php');
?>

<html>
	<body>
		    <!-- Page Content -->
		<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List of Farms</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
					<li><a href="admin_farm_list.php">Farms</a>
                    </li>
                    <li class="active">Bins</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the add farm form
///////////////////////////////////////////////////////////////////////////////////////////////////
//REMEMBER TO CHANGE THIS WHEN LOGIN FUNCTIONALITY IS UP////////////////
			if ($loggedIn == true) {
////////////////////////////////////////////////////////////////////
				// Get Farm Id
				$id = $_GET["id"];
				// Create query
				$query = "select * FROM warehouse_bin WHERE wareouse_id = '$id'";
				$result = mysql_query($query);
				
				while($row = mysql_fetch_array($result)){
					echo  $row['bin_marker'] . "<br />";
				}
				$mysqli->close();
			}

			// If the user is not logged in, redirect them to login.php if they try to access this page
			else {
				echo '<script type="text/javascript">
							location.replace("login.php");
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