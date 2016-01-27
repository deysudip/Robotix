<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Robonix, Robotics, Robotix, Robotics Workshop">
    <meta name="author" content="">

    <title>Roboniche.IN</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <!--<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">-->

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative_dashboard.css" type="text/css">
    <link rel="stylesheet" href="css/simple-sidebar.css" type="text/css" >

    <!-- Calender Modal Css -->
    <link rel="stylesheet" href="http://weloveiconfonts.com/api/?family=fontawesome">
    <link rel="stylesheet" href="css/calendar_modal.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="index.php">ROBONICHE<span>.in</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a data-toggle="modal" href="#event-cal-modal">Events</a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Services</a>
                </li>
                <li>
                    <a class="page-scroll" href="#portfolio">Portfolio</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
<?php

if (!isset($_SESSION['logged_user'])){
?>
                    <li>
                        <a href="#login" data-toggle="modal">Log In</a>
                    </li>
<?php
}

if (isset($_SESSION['logged_user'])) {
?>
                    <li class="dropdown">
                        <a class="page-scroll dropdown-toggle " data-toggle="dropdown" href="#"><?php echo($_SESSION['logged_user'])?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="user_dashboard.php">Dashboard</a></li>
                            <!--<li><a href="#">Submenu 1-2</a></li>-->
                            <li><a href="php/logout.php">Logout</a></li>
                        </ul>
                    </li>

<?php
}
?>



            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar">
                <li class="prof-pic">
                    <img src="img/avatar.png">
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row ">
                    <div class="dashboard col-lg-3 col-md-5 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                            <h3>Made with Love</h3>
                            <p class="text-muted">You have to make your websites with love these days!</p>
                        </div>
                    </div>
                    <div class="dashboard col-lg-3 col-md-5 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                            <h3>Made with Love</h3>
                            <p class="text-muted">You have to make your websites with love these days!</p>
                        </div>
                    </div>
                    <div class="dashboard col-lg-3 col-md-5 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                            <h3>Made with Love</h3>
                            <p class="text-muted">You have to make your websites with love these days!</p>
                        </div>
                    </div>
                    <div class="dashboard col-lg-3 col-md-5 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                            <h3>Made with Love</h3>
                            <p class="text-muted">You have to make your websites with love these days!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

</header>


<!-- Calender Modal-->

<div id="event-cal-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- modal content -->
        <div class="calendar-container">
            <div class="calendar">
                <header>
                    <h2 class="month"></h2>
                    <a class="btn-prev fontawesome-angle-left" href="#"></a>
                    <a class="btn-next fontawesome-angle-right" href="#"></a>
                </header>
                <table>
                    <thead class="event-days">
                    <tr></tr>
                    </thead>
                    <tbody class="event-calendar">
                    <tr class="1"></tr>
                    <tr class="2"></tr>
                    <tr class="3"></tr>
                    <tr class="4"></tr>
                    <tr class="5"></tr>
                    </tbody>
                </table>
            </div>
            <div class="list-event">
                <div class="day-event">
                    <a href="#" class="close fontawesome-remove" data-dismiss="modal"></a>
                    <h2 class="title" id="event_title">Lorem ipsum 1</h2>
                    <p class="date" id="event_date"><b>2014-12-16</b></p>
                    <p class="details" id="event_details">Lorem Ipsum är en utfyllnadstext från tryck- och förlagsindustrin. Lorem ipsum har varit standard ända sedan 1500-talet, när en okänd boksättare tog att antal bokstäver och blandade dem för att göra ett provexemplar av en bok.</p>
                    <p class="details" id="event_insti"><b>Venue:</b> <span></span></p>
                    <p class="details" id="event_min"><b>Min No of Participant:</b> <span></span></p>
                    <p class="details" id="event_max"><b>Max No of Participant:</b> <span></span></p>
                    <p class="details" id="event_type"><b>Type:</b> <span></span></p>
                    <label class="sign-up">
                        <span id="reg-btn">Register for this Event!</span>
                    </label>
                </div>
            </div>
        </div>
        <!--<div class="calender-footer">
            sfdagdsgsh
        </div>-->
    </div>
</div>

<!-- bad registration modal -->
<div id="bad-reg" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="login-modal" id="sign-conf-modal">
            <div class="form-box">
                <div class="form-top">
                    <div class="form-top-left">
                        <h3>Roboniche.in</h3>
                    </div>
                    <div class="form-top-right">
                        <i class="fa fa-times" data-dismiss="modal"></i>
                    </div>
                </div>
            </div>
            <div class="form-bottom">
                <div style="color: #fff">
                    <h4 id="line1"></h4>
                    <h4 id="line2"></h4>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->

<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->

<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/wow.min.js"></script>


<!-- Custom Theme JavaScript -->
<script src="js/creative.js"></script>
<!-- Login Modal JavaScript -->
<script src="js/login_modal.js"></script>
<!-- Calender Modal JavaScript -->
<script src="js/simplecalendar.js.php"></script>

</body>