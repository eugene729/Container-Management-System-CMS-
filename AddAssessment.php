<?php
include('connection.php');
if (isset($_POST['Submit']))
{
    $ShipmentName = $_POST['ShipmentName'];
    $ShipmentCode = $_POST['ShipmentCode'];
	$ShipmentDescription = $_POST['ShipmentDescription'];
	$ContainerCode = $_POST['ContainerCode'];
    $ExporterName = $_POST['ExporterName'];
    $ImporterName = $_POST['ImporterName'];
	

    if ($ShipmentName == "" || $ShipmentCode == "")
    {
        echo "<script>alert('Please enter the Shipment Name and Shipment Code')</script>";
    }
    else
    {
        $result = "select ShipmentName,ShipmentCode from container WHERE ShipmentName='$ShipmentName' OR ShipmentCode='$ShipmentCode'";
        $run2 = mysqli_query($dbcon, $result);
        if (mysqli_num_rows($run2))
        {
            // if the container exist
            echo "<script>alert('The Container Already Existed')</script>";
        }
        else {

            $sqlinsert = "INSERT INTO container (ShipmentName,ShipmentCode, ShipmentDescription, ContainerCode, ExporterName, ImporterName) 
                          VALUES ('$ShipmentName','$ShipmentCode', '$ShipmentDescription', '$ContainerCode','$ExporterName', '$ImporterName')";
            if (!mysqli_query($dbcon, $sqlinsert)) {
                die('error');
            }
            else
            {
                //Creating Folder in the directory
                $curdir = getcwd();
                mkdir($curdir."/".$ShipmentCode,0777);
                echo "<script>alert('New Shipment Has Been Added')</script>";
            }
        }
    }
}
if (isset($_POST['PreviousPage']))
{
    header("Location: AdminChoice.php");
}
if (isset($_POST['LogOut']))
{
    header("Location: Login.php");
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
    <form role="form" method="POST" action="AddAssessment.php">
        <form>
            <center><img src="APU/APULogo.jpg" height="200" width="200"></center>
            <center><h2> Add Assessment </h2></center>
            <div class="form-group col-lg-20">
                <label for="exampleInputEmail1">Please Insert Module Name</label>
                <input type="text" class="form-control" placeholder="Module Name" name="ModuleName">
            </div>
            <div class="form-group col-lg-20">
                <label for="exampleInputPassword1">Please Insert Module Code</label>
                <input type="text" class="form-control" placeholder="Module Code" name="ModuleCode">
            </div>
            <div class="form-group col-lg-20">
                <label for="exampleInputPassword1">Please Choose The Intake Code</label>
            </div>
            <div class="form-group col-lg-20">
                <?php

                $sql = "select DISTINCT Intakecode from student";
                $run=mysqli_query($dbcon,$sql);

                echo "<select name='Intakecode'>";
                while ($row=mysqli_fetch_array($run))
                {
                    echo"<option value='".$row['Intakecode']."'>".$row['Intakecode']."</option>";
                }
                echo"</select>";
                ?>
                <!-- <select class="form-control input-lg">...</select>-->
            </div>
            <div class="form-group col-lg-20">
                <label for="exampleInputPassword1">Please Choose The Lecturer Name</label>
            </div>
            <div class="form-group col-lg-20">
                <?php
                $sql1 = "select Name from lecturer";
                $run1=mysqli_query($dbcon,$sql1);

                echo "<select name='Name'>";
                while ($row1=mysqli_fetch_array($run1))
                {
                    echo"<option value='".$row1['Name']."'>".$row1['Name']."</option>";
                }
                echo"</select>";
                ?>
            </div>
            <div class="form-group col-lg-20">
                <input type="submit" name="Submit" value="Submit">
                <input type="submit" name="PreviousPage" value="Previous Page">
            </div>
            <div class="form-group col-lg-20">
                <input type="submit" name="LogOut" value="Log Out">
            </div>
            <center><h5>© 2018 Copyright Mamak Kau</h5></center>
    </form>
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
