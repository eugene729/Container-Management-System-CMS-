

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Static Top Navbar Example for Bootstrap</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-static-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="form-group col-lg-20">
    <form align = "center" name="frmLogIn" method="POST" action="ViewMarkingSheet.php">
        <img src="APU/APULogo.jpg" height="200" width="200">
        <h2> View Marking Sheet </h2>
        <h3>List Of The Marking Sheet</h3>
        <?php

        if ($handle = opendir('/FYP/Report')) {
            while (false !== ($file = readdir($handle)))
            {
                if ($file != "." && $file != "..")
                {
                    echo $thelist = '<li><a href= Report/'.$file.'>'.$file.'</a></li>';
                }
            }
            closedir($handle);
        }
        if (isset($_POST['LogOut']))
        {
            header("Location: Login.php");
        }
        if (isset($_POST['PreviousPage']))
        {
            header("Location: AdminChoice.php");
        }
        ?>
        <br>
        <input type="submit" name="PreviousPage" value="Previous Page">
        <input type="submit" name="LogOut" value="Log Out">
        <br>
        <br>
        <center><h5>© 2018 Copyright Mamak Kau</h5></center>
</div>





<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
