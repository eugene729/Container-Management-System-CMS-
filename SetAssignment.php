<?php
include('connection.php');
if (isset($_POST['LogOut']))
{
    header("Location: Login.php");
}
if (isset($_POST['PreviousPage']))
{
    header("Location: LecturerChoice.php");
}
if (isset($_POST['Submit']))
{
    $ModuleName = $_POST['ModuleName'];
    if ($ModuleName == '1')
    {
        echo "<script>alert('Please Select The Module Name')</script>";
    }
    else
    {
        $Date = $_POST['Date'];
        $Month = $_POST['Month'];
        $Year = $_POST['Year'];
        $Time = $_POST['Time'];
        $submissiondate = $Year . '-' . $Month . '-' . $Date . ' ' . $Time;
        $sql2 = "UPDATE assignment SET SubmissionDate = '$submissiondate' WHERE ModuleName= '$ModuleName'";
        $run2 = mysqli_query($dbcon, $sql2);
        if (!$run2) {
            echo "<script>alert('Fail To Update')</script>";
        } else {
            echo "<script>alert('Assignment Submission Due Date Has Been Set')</script>";
        }
    }

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
</head>

<body>
<div class="container">

    <!-- Static navbar -->
    <center><img src="APU/APULogo.jpg" height="200" width="200"></center>
    <form name="frmLogIn" method="POST" action="SetAssignment.php">

    <div class="form-group col-lg-20">
        <center>Select The Module
            <?php
                session_start();
                $data = $_SESSION["Lecturer"];
                $sql1 = "select ModuleName from assignment Where LecturerName='$data[1]'";
                $run1=mysqli_query($dbcon,$sql1);

                echo "<select name='ModuleName'>";
                echo"<option value = '1'>(Module Name)</option>";
                while ($row1=mysqli_fetch_array($run1))
                {
                    echo"<option value='".$row1['ModuleName']."'>".$row1['ModuleName']."</option>";
                }
                echo"</select>";
                ?>
        </center>
    </div>
        <center>
            <div class="form-group col-lg-20">
            Select The Submission Date

            </div>
            <div class="form-group col-lg-20">

                <table class="table table-condensed" >
                    <tr>
                        <th>
                            <center>Date</center>
                        </th>
                        <th>
                            <center>Month</center>
                        </th>
                        <th>
                            <center>Year</center>
                        </th>
                        <th>
                            <center>Time</center>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <center>
                            <?php
                            echo "<select name='Date'>";
                                for ($date = 1; $date <= 31; $date++)
                                {
                                    if ($date <=9)
                                    {
                                        echo "<option value='0".$date."'>$date</option>";
                                    }
                                   else
                                   {
                                       echo "<option value='".$date."'>$date</option>";
                                   }
                                }
                                echo"</select>";
                            ?>
                            </center>
                        </th>
                        <th>
                            <center>
                            <?php
                            echo "<select name='Month'>";
                                echo "<option value='01'>January</option>";
                                echo "<option value='02'>February</option>";
                                echo "<option value='03'>March</option>";
                                echo "<option value='04'>April</option>";
                                echo "<option value='05'>May</option>";
                                echo "<option value='06'>June</option>";
                                echo "<option value='07'>July</option>";
                                echo "<option value='08'>August</option>";
                                echo "<option value='09'>September</option>";
                                echo "<option value='10'>October</option>";
                                echo "<option value='11'>November</option>";
                                echo "<option value='12'>December</option>";
                                echo"</select>";

                            ?>
                            </center>
                        </th>
                        <th>
                            <center>
                                <?php
                                echo "<select name='Year'>";
                                for ($year = 2018; $year <= 2030; $year++)
                                {
                                    echo "<option value='".$year."'>$year</option>";
                                }
                                echo"</select>";
                                ?>
                            </center>
                        </th>
                        <th>
                            <center>
                                <?php
                                echo "<select name='Time'>";
                                for ($time = 0; $time <= 23; $time++)
                                {
                                    echo "<option value='".$time.":00:00'>$time:00</option>";
                                }
                                echo"</select>";
                                ?>
                            </center>
                        </th>
                    </tr>
                </table>
            </div>


            <div class="form-group col-lg-20">
                <input type="submit" name="Submit" value="Submit">
                <input type="submit" name="PreviousPage" value="Previous Page">
                <input type="submit" name="LogOut" value="Log Out">
            </div>
            <br>
            <br>
            <center><h5>© 2018 Copyright Mamak Kau</h5></center>
        </center>
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
