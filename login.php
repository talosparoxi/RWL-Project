<?php
// Start the session
session_start();

// Destroy the session and clear the session cookie
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logout') {
        // Kill the server-side session
        session_destroy();

        // Kill the client-side cookie that stores the session ID
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    }
    header('location:index.php');
}

// Include the header.php file
include('header.php');
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Employee Login</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Login</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    <?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = $mysqli->real_escape_string($_POST['password']);

        // Create query
        $query = "SELECT COUNT(*) FROM Users WHERE Username='" .$username ."' AND Password=sha1('" .$password ."')";
        $result = $mysqli->query($query);

        $row = $result->fetch_row();

        // If the login was successful
        if ($row[0] == 1) {
            $loggedIn = true;

            // Store the login boolean and the username of the logged in user in the session
            $_SESSION['loggedIn'] = $loggedIn;
            $_SESSION['username'] = $_POST['username'];
            // Go to the index.php
            echo '<script type="text/javascript">
                    location.replace("index.php");
                    </script>';
        }
    }

    // If the user is not logged in, display a login form
    if ($_SESSION["loggedIn"] == false) {
    ?>

        <div class="row">
            <div class="col-lg-4">
                <form class="form-signin" name="loginForm" id="loginForm" method="post" action="login.php">
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required data-validation-required-message="Please enter your username.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required data-validation-required-message="Please enter your password.">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="login" value="Login"/>
                </form>
            </div>
        </div>

    <?php
    }

    // If the user is logged in
    else {
        // Do something
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>