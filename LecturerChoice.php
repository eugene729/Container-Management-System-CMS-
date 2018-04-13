<?php
session_start();
$data = $_SESSION["Manager"];
$a1 = "<center><h1> Welcome ".$data[0]."</h1></center>";
if (isset($_POST['LogOut']))
{
    header("Location: Login.php");
}
if (isset($_POST['SetMarkingCriteria']))
{
    header("Location: SetMarkingCriteria.php");
}
if (isset($_POST['SetAssignmentSubmissionDueDate']))
{
    header("Location: SetAssignment.php");
}
if (isset($_POST['ViewAssignment']))
{
    header("Location: ViewAssignment.php");
}
?>
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

    <title>Maersk Line Corp</title>

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
    <style>
        #button
        {
            width: 6em;
            border: 2px solid green;
            background: #ffe;
            border-radius: 5px;
        }
        body
        {
            background-color: white;
        }
        h1
        {
            color:black;
        }
        h2
        {
            color:black;
        }
    </style>
</head>

<body>
<div class="container">

    <!-- Static navbar -->
    <center><img src="./Home _ WebSpace_files/user2.png" height="400" width="400"></center>
    <?php
    echo $a1;
    ?>
    <form name="frmLogIn" method="POST" action="LecturerChoice.php">
        <center>
            <input type="submit" name="SetShipmentDepartureDate" value="Set Shipment Departure Date">
            <input type="submit" name="SetShipmentArrivalDate" value="Set Shipment Arrival Date">
            <input type="submit" name="ViewAllShipment" value="View All Shipment">
            <input type="submit" name="LogOut" value="Log Out">
        </center>
        <br>
        <center><h5>© 2018 Copyright.Maersk Line</h5></center>
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
