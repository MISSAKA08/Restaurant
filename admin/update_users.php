<!DOCTYPE html>
<html lang="en">
<?php
session_start();
error_reporting(E_ALL);
include("../connection/connect.php");

$error = '';
$success = '';

if (isset($_POST['submit'])) {
    // Check for empty fields
    if (empty($_POST['uname']) || empty($_POST['fname']) || empty($_POST['lname']) || 
        empty($_POST['email']) || empty($_POST['password']) || empty($_POST['phone'])) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <strong>All fields are required!</strong>
                  </div>';
    } else {
        // Validate email
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                          <strong>Invalid email!</strong>
                      </div>';
        } elseif (strlen($_POST['password']) < 6) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                          <strong>Password must be at least 6 characters!</strong>
                      </div>';
        } elseif (strlen($_POST['phone']) < 10) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                          <strong>Invalid phone number!</strong>
                      </div>';
        } else {
            // Prepare update statement
            $userId = $_GET['user_upd'];
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $mql = "UPDATE users SET username=?, f_name=?, l_name=?, email=?, phone=?, password=? WHERE u_id=?";
            $stmt = mysqli_prepare($db, $mql);
            mysqli_stmt_bind_param($stmt, 'ssssssi', $_POST['uname'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['phone'], $hashedPassword, $userId);
            
            if (mysqli_stmt_execute($stmt)) {
                $success = '<div class="alert alert-success alert-dismissible fade show">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <strong>User updated successfully!</strong>
                          </div>';
            } else {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <strong>Error updating user:</strong> ' . mysqli_error($db) . '
                          </div>';
            }

            mysqli_stmt_close($stmt);
        }
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Update Users</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
    <div id="main-wrapper">
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        <span><img src="images/food-mania-logo.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="images/bookingSystem/3.png" alt="user" class="profile-pic" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
   
        <div class="container-fluid">
            <?php echo $error; echo $success; ?>
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Update Users</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $ssql = "SELECT * FROM users WHERE u_id=?";
                        $stmt = mysqli_prepare($db, $ssql);
                        mysqli_stmt_bind_param($stmt, 'i', $_GET['user_upd']);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $newrow = mysqli_fetch_array($result);
                        mysqli_stmt_close($stmt);
                        ?>
                        <form action='' method='post'>
                            <div class="form-body">
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Username</label>
                                            <input type="text" name="uname" class="form-control" value="<?php echo htmlspecialchars($newrow['username']); ?>" placeholder="username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">First Name</label>
                                            <input type="text" name="fname" class="form-control form-control-danger" value="<?php echo htmlspecialchars($newrow['f_name']); ?>" placeholder="John">
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" name="lname" class="form-control" value="<?php echo htmlspecialchars($newrow['l_name']); ?>" placeholder="Doe">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Email</label>
                                            <input type="text" name="email" class="form-control form-control-danger" value="<?php echo htmlspecialchars($newrow['email']); ?>" placeholder="example@gmail.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($newrow['phone']); ?>" placeholder="phone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" name="submit" class="btn btn-success" value="Save"> 
                                <a href="all_users.php" class="btn btn-inverse">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      
        <footer class="footer"> © 2021 All rights reserved. </footer>
    </div>
   
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
