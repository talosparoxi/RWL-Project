<?php
/**
 * This page holds the form for displaying employees.
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
 * @since       2015-01-15
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
                <h1 class="page-header">List of employees</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo ROOT; ?>/index.php">Home</a>
                    </li>
					<li><a href="<?php echo ROOT; ?>/admin/admin_page_list.php">Admin Root</a>
                    </li>
                    <li class="active">employees</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
		<?php
			// If the user is logged in, display the form
			if ($loggedIn == true) {			
						
				// Create query
				$query = "select * FROM employee";
				$employees = $db->query($query);
				
				if ($employees->num_rows > 0) {
					echo "<table style='width:100%' border='1'>";
					echo "<tr><td>Full Name</td> <td>Phone #</td> <td>Email</td> <td>Edit Personal Data</td> <td>Emergency Contact Name</td> <td>Modify Contacts</td> </tr>";
					while($row = $employees->fetch_assoc()){
						$contactQueryP = "select * from employee_emergency_contact where emp_id = '{$row['emp_id']}' AND emerg_contact_id = '1'";
						$contactP = $db->query($contactQueryP)->fetch_assoc();
						$contactQueryS = "select * from employee_emergency_contact where emp_id = '{$row['emp_id']}' AND emerg_contact_id = '2'";
						$contactS = $db->query($contactQueryS)->fetch_assoc();
						
						echo "<tr><td>" . $row['emp_first_name'] . " " . $row['emp_middle_initial'] . " " . $row['emp_last_name'] . "</td>";
						echo "<td>" . $row['emp_phone'] . "</td>";
						echo "<td>" . $row['emp_email'] . "</td>";
						echo "<td><form action = '".ROOT."/admin/employee/admin_update_employee.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '" . $row['emp_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Edit'></form></td>";

						echo "<td>".$contactP['emerg_first_name']." ".$contactP['emerg_last_name']."<br />".$contactS['emerg_first_name']." ".$contactS['emerg_last_name']."</td>";
						echo "<td><form action = '".ROOT."/admin/employee/admin_update_employee_emergency_contacts.php' method = 'get'> <input hidden type = 'radio' name = 'id' value = '" . $row['emp_id'] . "' checked><input type = submit class='btn btn-primary' value = 'Modify'></form></td></tr>";
					}
					echo "</table>";
				}
				else {
					echo "0 results";
				}
				$db->close();
			}

			// If the user is not logged in, redirect them to login.php if they try to access this page
			else {
				echo '<script type="text/javascript">
							location.replace("'.ROOT.'/login/index.php");
							</script>';
			}
 		echo "<hr><form action = '".ROOT."/admin/employee/admin_add_employee.php'><input type = submit class='btn btn-primary' value = 'Add Employee'></form><br />";
 		echo "<hr><form action = '".ROOT."/admin/employee/admin_driver_list.php'><input type = submit class='btn btn-primary' value = 'Driver List'></form><br />";
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