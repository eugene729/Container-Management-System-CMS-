<?php
include('connection.php');
session_start();
if (isset($_POST['Submit']))
{
    $moduleName = $_POST['ModuleName'];
    if ($moduleName == '1')
    {
        echo "<script>alert('Please Choose The Module Name')</script>";
    }
    else
    {
        $data = $_SESSION["Staff"];
        $email = $data[4];
        $name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $moduleName = $_POST['ModuleName'];
        $dt = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur'));
        $submittingDate = $dt->format('Y-m-d H:i:s');

        $checkSubmissionDate = "select * from assignment WHERE ModuleName='$moduleName'";
        $run2 = mysqli_query($dbcon, $checkSubmissionDate);
        $row2 = mysqli_fetch_array($run2);

        if (mysqli_num_rows($run2)) {
            $_SESSION["Assignment"] = $row2;
        }


        $assignmentInfo = $_SESSION["Assignment"];
        if ($assignmentInfo[4] == "")// if submission date is not yet created
        {
            echo "<script>alert('No Submission Due Date Yet')</script>";
        }
        else // if there is
        {
            if ($submittingDate > $assignmentInfo[4]) // late submission
            {
                echo "<script>alert('You Assignment Is Not Accepted Because You Submit Your Assignment Late')</script>";
            }
            else // still can submit
            {
                if (isset($name)) {
                    if (!empty($name)) {
                        $location = $assignmentInfo[1] . '/';
                        if (move_uploaded_file($tmp_name, $location . $name))
                        {
                            // Sending Notification Email To The Student
                            mail('' . $email, 'Assignment Submission Notification', 'Your Assignment Has Been Submitted At ' . $submittingDate . '. Thank You');
                            $sqlinsert = "INSERT INTO submittedassignment (TPNumber, StudentName, IntakeCode, ModuleName, ModuleCode, SubmittedDate) VALUES ('$data[0]','$data[2]','$data[3]','$moduleName', '$assignmentInfo[1]','$submittingDate')";
                            if (!mysqli_query($dbcon, $sqlinsert))
                            {
                                die('error');
                            } else {
                                echo "<script>alert('Your Assignment Has Been Submitted')</script>";
                            }
                        } else {
                            echo "<script>alert('The Admin Has Not Added The Module Yet')</script>";
                        }
                    } else {
                        // file not chosen
                        echo "<script>alert('Please Upload Your Assignment')</script>";
                    }
                }
            }

        }
    }
}
if (isset($_POST['PreviousPage']))
{
    header("Location: StudentChoice.php");
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
</head>

<body>

<div class="container">
        <form method="POST" action="SubmitAssignment.php"  enctype="multipart/form-data">
        <form>
            <div class="form-group col-lg-20">
                <center><img src="APU/APULogo.jpg" height="200" width="200"></center>
            </div>
            <div class="form-group col-lg-20">
                <h2> Please Choose The Module Of The Assignment That You Want To Submit</h2>
            </div>
            <div class="form-group col-lg-20">
                <label for="exampleInputPassword1">Module Name</label>
            </div>
            <div class="form-group col-lg-20">
                <?php

                $data = $_SESSION["Student"];
                $result = "select ModuleName from assignment WHERE Intakecode='$data[3]'";
                $run=mysqli_query($dbcon,$result);

                echo "<select name='ModuleName'>";
                echo "<option value='1'>(Module Name)</option>";
                while ($row=mysqli_fetch_array($run))
                {
                    echo"<option value='".$row['ModuleName']."'>".$row['ModuleName']."</option>";
                }
                echo"</select>";
                ?>
            </div>
            <div class="form-group col-lg-20">
                <label for="exampleInputPassword1">Please Upload The Assignment</label>
            </div>
            <div class="form-group col-lg-20">
                <input type="file" name="file"><br><br>
            </div>
            <div class="form-group col-lg-20">
                <input type="submit" value="Submit" name="Submit">
                <input type="submit" value="Previous Page" name="PreviousPage">
                <input type="submit" value="Log Out" name="LogOut">
            </div>
            <br>
            <br>
            <center><h5>© 2018 Copyright Mamak Kau</h5></center>
            </form>

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

