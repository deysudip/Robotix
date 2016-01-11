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
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- Login Modal Css -->
    <link rel="stylesheet" href="css/form-elements.css">
    <link rel="stylesheet" href="css/login_modal.css">

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
                <a class="navbar-brand page-scroll" href="#page-top">ROBONICHE<span>.in</span></a>
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
                        <a data-toggle="modal" href="#login">Log In</a>
                    </li>
<?php
}

if (isset($_SESSION['logged_user'])) {
?>
                    <li class="dropdown">
                        <a class="page-scroll dropdown-toggle " data-toggle="dropdown" href="#"><?php echo($_SESSION['logged_user'])?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Submenu 1-1</a></li>
                            <li><a href="#">Submenu 1-2</a></li>
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
        <div class="header-content">
            <div class="header-content-inner">
                <h1>WELCOME TO ROBONICHE</h1>
                <hr>
                <p>Your one step solution to all ROBOTICS Workshop!</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading"> We've got what you need!</h2>
                    <hr class="light">
                    <p class="text-faded">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>
                    <a class="btn btn-default btn-xl" data-toggle="modal" href="#sign">Get Started!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>Sturdy Templates</h3>
                        <p class="text-muted">Our templates are updated regularly so they don't break.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You have to make your websites with love these days!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Modal -->
    <div id="login" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="login-modal" id="login-modal">
                <div class="form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login to Roboniche</h3>
                            <h4>Enter your username and password to log on</h4>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-times" data-dismiss="modal"></i>
                        </div>
                    </div>
                </div>
                <div class="form-middle" >
                    <div class="login-option">
                        <ul>
                            <li class="selected">
                                <a href="#" id="user-login">User</a>
                            </li>
                            <li>
                                <a href="#" id="group-login">Group</a>
                            </li>
                            <li>
                                <a href="#" id="coord-login">Coordinator</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="form-bottom user-login">
                    <form role="form" action="" method="post"  class="login-form">
                        <div class="alert alert-danger err-msg">

                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="username">Username</label>
                            <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="password">Password</label>
                            <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password" >
                        </div>

                        <button type="submit" class="btn" name="user-login-btn">Sign in!</button>
                    </form>
                </div>
                <div class="form-bottom group-login">
                    <form role="form" action="" method="post" class="login-form">
                        <div class="alert alert-danger err-msg">

                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="group-name">Groupname</label>
                            <input type="text" name="group-name" placeholder="Group Username..." class="form-username form-control" id="group-name">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="group-password">Password</label>
                            <input type="password" name="group-password" placeholder="Group Password..." class="form-password form-control" id="group-password">
                        </div>
                        <button type="submit" class="btn" name="group-login-btn">Sign in!</button>
                    </form>
                </div>
                <div class="form-bottom coord-login">
                    <form role="form" action="#" method="post" class="login-form">
                        <div class="alert alert-danger err-msg">

                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="coord-name">Groupname</label>
                            <input type="text" name="coord-name" placeholder="Coordinator Username..." class="form-username form-control" id="coord-name">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="coord-password">Password</label>
                            <input type="password" name="coord-password" placeholder="Coordinator Password..." class="form-password form-control" id="coord-password">
                        </div>
                        <button type="submit" class="btn" name="coord-login-btn">Sign in!</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

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
                        <h2 class="title">Lorem ipsum 1</h2>
                        <p class="date"><b>2014-12-16</b></p>
                        <p class="details">Lorem Ipsum är en utfyllnadstext från tryck- och förlagsindustrin. Lorem ipsum har varit standard ända sedan 1500-talet, när en okänd boksättare tog att antal bokstäver och blandade dem för att göra ett provexemplar av en bok.</p>
                        <label class="sign-up">
                            <span>Sign Up for this Event!</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="calender-footer">
                sfdagdsgsh
            </div>
         </div>
    </div>

    <!-- Sign Up Modal -->
    <div id="sign" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="login-modal" id="sign-modal">
                <div class="form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Sign Up to Roboniche</h3>
                            <h4>Please provide your details below</h4>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-times" data-dismiss="modal"></i>
                        </div>
                    </div>
                </div>
                <div class="form-middle" >
                    <div class="sign-option">
                        <ul>
                            <li class="selected">
                                <a href="#" id="user-sign">User</a>
                            </li>
                            <li>
                                <a href="#" id="group-sign">Group</a>
                            </li>
                            <li>
                                <a href="#" id="coord-sign">Coordinator</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="form-bottom user-sign">
                    <form role="form" action="#" method="post" class="login-form">
                        <div class="alert alert-danger err-msg">

                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="userfullname-sign">User Full Name</label>
                            <input type="text" name="userfullname-sign" placeholder="User Full Name..." class="form-username form-control" id="userfullname-sign">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="username-sign">Username</label>
                            <input type="text" name="username-sign" placeholder="Username..." class="form-username form-control" id="username-sign">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="password-sign">Password</label>
                            <input type="password" name="password-sign" placeholder="Password..." class="form-password form-control" id="password-sign">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="email-sign">Email Id</label>
                            <input type="email" name="email-sign" placeholder="Email Id..." class="form-username form-control" id="email-sign">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="contact-sign">Contact</label>
                            <input type="text" name="contact-sign" placeholder="Contact..." class="form-username form-control" id="contact-sign"
                                   onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="insti-sign">Instituition Name</label>
                            <select name="insti-sign"  class="form-username form-control insti-drop" id="insti-sign">
                                <option disabled selected value="">Select Your Instituition..</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="insti-coord-sign">Coordinator Name</label>
                            <select name="insti-coord-sign"  class="form-username form-control coord-drop" id="insti-coord-sign">
                                <option disabled selected value="">Select Your Coordinator..</option>
                            </select>
                        </div>
                        <button type="submit" class="btn" name="user-sign-btn">Sign Up!</button>
                    </form>
                </div>
                <div class="form-bottom group-sign">
                    <form role="form" action="#" method="post" class="login-form" id="group-sign">
                        <div class="alert alert-danger err-msg">

                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="group-username-sign">Group Username</label>
                            <input type="text" name="group-username-sign" placeholder="Group Username..." class="form-username form-control" id="group-username-sign">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="group-password-sign"> Group Password</label>
                            <input type="password" name="group-password-sign" placeholder="Group Password..." class="form-password form-control" id="group-password-sign">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="group-insti-sign">Instituition Name</label>
                            <select name="group-insti-sign"  class="form-username form-control insti-drop" id="group-insti-sign">
                                <option disabled selected value="">Select Your Instituition..</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="group-insti-coord-sign">Coordinator Name</label>
                            <select name="group-insti-coord-sign"  class="form-username form-control coord-drop" id="group-insti-coord-sign">
                                <option disabled selected value="">Select Your Coordinator..</option>
                            </select>
                        </div>
                        <div class="form-group member-nav">
                            <header>
                                <h2 member="First">First Member</h2>
                                <a class="btn-prev-mem fontawesome-angle-left" href="#"></a>
                                <a class="btn-next-mem fontawesome-angle-right" href="#"></a>
                            </header>
                        </div>
                        <div class="form-group-sub select-mem" id="First">
                            <div class="form-group">
                                <label class="sr-only" for="first-mem-name">First member name</label>
                                <input type="text" name="first-mem-name" placeholder="First Member name..." class="form-username form-control" id="first-mem-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="first-mem-email">First member Email Id</label>
                                <input type="email" name="first-mem-email" placeholder="First Member Email Id..." class="form-email form-control" id="first-mem-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="first-mem-contact">First Member Contact</label>
                                <input type="text" name="first-mem-contact" placeholder="First Member Contact..." class="form-number form-control" id="first-mem-contact"
                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                            </div>
                        </div>
                        <div class="form-group-sub" id="Second">
                            <div class="form-group">
                                <label class="sr-only" for="second-mem-name">Second member name</label>
                                <input type="text" name="second-mem-name" placeholder="Second Member name..." class="form-username form-control" id="second-mem-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="second-mem-email">Second member Email Id</label>
                                <input type="email" name="second-mem-email" placeholder="Second Member Email Id..." class="form-email form-control" id="second-mem-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="second-mem-contact">Second Member Contact</label>
                                <input type="text" name="second-mem-contact" placeholder="Second Member Contact..." class="form-number form-control" id="second-mem-contact"
                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                            </div>
                        </div>
                        <div class="form-group-sub" id="Third">
                            <div class="form-group">
                                <label class="sr-only" for="third-mem-name">Third member name</label>
                                <input type="text" name="third-mem-name" placeholder="Third Member name..." class="form-username form-control" id="third-mem-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="third-mem-email">Third member Email Id</label>
                                <input type="email" name="third-mem-email" placeholder="Third Member Email Id..." class="form-email form-control" id="third-mem-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="third-mem-contact">Third Member Contact</label>
                                <input type="text" name="third-mem-contact" placeholder="Third Member Contact..." class="form-number form-control" id="third-mem-contact"
                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                            </div>
                        </div>
                        <div class="form-group-sub" id="Fourth">
                            <div class="form-group">
                                <label class="sr-only" for="fourth-mem-name">Fourth member name</label>
                                <input type="text" name="fourth-mem-name" placeholder="Fourth Member name..." class="form-username form-control" id="fourth-mem-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="fourth-mem-email">Fourth member Email Id</label>
                                <input type="email" name="fourth-mem-email" placeholder="Fourth Member Email Id..." class="form-email form-control" id="fourth-mem-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="fourth-mem-contact">Fourth Member Contact</label>
                                <input type="text" name="fourth-mem-contact" placeholder="Fourth Member Contact..." class="form-number form-control" id="fourth-mem-contact"
                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                            </div>
                        </div>
                        <button type="submit" form="group-sign" class="btn" name="group-sign-btn">SIGN UP AS A TEAM!</button>
                    </form>
                </div>
                <div class="form-bottom coord-sign">
                    <form role="form" action="#" method="post" class="login-form">
                        <div class="alert alert-danger err-msg">

                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="coord-fullname-sign">Username</label>
                            <input type="text" name="coord-fullname-sign" placeholder="User Full Name..." class="form-username form-control" id="coord-fullname-sign">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="coord-username-sign">Coordinator Username</label>
                            <input type="text" name="coord-username-sign" placeholder="Coordinator Username..." class="form-username form-control" id="coord-username-sign">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="coord-password-sign">Coordinator Password</label>
                            <input type="password" name="coord-password-sign" placeholder="Coordinator Password..." class="form-password form-control" id="coord-password-sign">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="coord-email-sign">Coordinator Email Id</label>
                            <input type="email" name="coord-email-sign" placeholder="Coordinator Email Id..." class="form-email form-control" id="coord-email-sign">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="coord-contact-sign">Coordinator Contact</label>
                            <input type="text" name="coord-contact-sign" placeholder="Coordinator Contact..." class="form-number form-control" id="coord-contact-sign"
                                   onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="coord-insti-sign">Instituition Name</label>
                            <select name="coord-insti-sign"  class="form-username form-control insti-drop" id="coord-insti-sign">
                                <option disabled selected value="">Select Your Instituition..</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="coord-mng-sign">Relationship Manager Name</label>
                            <select name="coord-mng-sign"  class="form-username form-control mng-drop" id="coord-mng-sign">
                                <option disabled selected value="">Select Your Relationship Manager..</option>
                            </select>
                        </div>
                        <button type="submit" class="btn" name="coord-sign-btn">SIGN UP AS A COORDINATOR!</button>
                    </form>
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
    <script src="js/simplecalendar.js"></script>

</body>

</html>
