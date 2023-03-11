<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator </title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">
                    <?php echo $_SESSION["user"]; ?>
                </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="adduser.php"><i class="fa fa-desktop"></i>Add User</a>
                    </li>

                    <li>
                        <a href="certificate.php"><i class="fa fa-qrcode"></i>Certificate</a>
                    </li>
                    <li>
                        <a href="completed.php"><i class="fa fa-qrcode"></i>Completed</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                    </li>




                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->


        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Create<small> New user</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="col-md-5 col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            NEW USERNAME AND PASSWORD
                            </div>
                            <div class="panel-body">
                                <form name="form" method="post" enctype='multipart/form-data'>

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input name="uname" class="form-control" required>

                                    </div>
                                
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="passwd" type="password" class="form-control" required>

                                    </div>

                                 
                                    <input name="submit" type="submit" class="btn btn-primary" required>


</form>
                            </div>
                                        
                            
                        </div>
                    </div>
    


    <?php
    
    if(isset($_POST['submit'])){
        include('db.php');
        $uname=$_POST['uname'];
        $passwd=$_POST['passwd'];
        $sql= 'INSERT INTO users values("","'.$uname.'","'.$passwd.'");';

        if(isset(mysqli_fetch_assoc(mysqli_query($con,'select id from users where username="'.$uname.'";'))['id'])){
            echo "<script>alert('User already exists, try another username.')</script>";
        }else{

        $result=mysqli_query($con,$sql);

        if($result){
            echo "<script>alert('User Created Successfully.')</script>";
        }else{
            echo "<script>alert('Something Went Wrong!')</script>";
        }

    }
}



    ?>





    <!-- /. ROW  -->

    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>