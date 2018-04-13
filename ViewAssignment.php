<?php
session_start();
include ('connection.php');
if (isset($_POST['LogOut']))
{
    header("Location: Login.php");
}
if (isset($_POST['PreviousPage']))
{
    header("Location: LecturerChoice.php");
}

if (isset($_POST['MarkAssignment']))
{
    $_SESSION["SelectedAssingment"]=$_POST['ModuleName'];
    header("Location: DownloadMarkingSheet.php");
}

if (isset($_POST['Upload']))
{
    $fileName = $_FILES['myFile']['name'];
    $fileTmpName = $_FILES['myFile']['tmp_name'];
    // lets find the extension of file
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    // lets check what is the extension
    $allowedType = array('csv');
    if(!in_array($fileExtension, $allowedType)) {?>
        <div class ="alert alert-danger">
            Please Upload The File (.CSV)
        </div>
    <?php }
    else
    {
        //upload your file
        $handle = fopen($fileTmpName,'r');//read mode 'r'
        while(($myData = fgetcsv($handle,1000,',')) !== FALSE)
        {
            $StudentName = $myData[0];
            $TPNumber = $myData[1];
            $Criteria1 = $myData[2];
            $Grade1 = $myData[3];
            $Criteria2 = $myData[4];
            $Grade2 = $myData[5];
            $Criteria3 = $myData[6];
            $Grade3 = $myData[7];
            $Criteria4 = $myData[8];
            $Grade4 = $myData[9];
            $Criteria5 = $myData[10];
            $Grade5 = $myData[11];
            $TotalMark = $myData[12];
            $FinalGrade = $myData[13]; //producttest
            $Feedback = $myData[14];

            $query = "insert into markandfeedback (StudentName, TPNumber, Criteria1, Grade1, Criteria2, Grade2, Criteria3, Grade3, 
                                                   Criteria4, Grade4, Criteria5, Grade5, TotalMark, FinalGrade, Feedback) 
                      VALUES  ('".$StudentName."','".$TPNumber."','".$Criteria1."','".$Grade1."','".$Criteria2."','".$Grade2."',
                               '".$Criteria3."','".$Grade3."','".$Criteria4."','".$Grade4."','".$Criteria5."','".$Grade5."',
                               '".$TotalMark."','".$FinalGrade."','".$Feedback."')";
            $run = mysqli_query($dbcon, $query);
        }
        if (!$run)
        {
            die("error");
        }
        else
        {
            if (isset($fileName))
            {
                if(!empty($fileName))
                {
                    $location = "Report/";
                    if (move_uploaded_file($fileTmpName,$location.$fileName))
                    {
                        {?>
                            <div class ="alert alert-success">
                                File Uploded
                            </div>
                        <?php }
                    }
                }

            }

        }
        $Selected = $_POST['ModuleName'];
        $sql6 = "select StudentName, TPNumber from submittedassignment WHERE ModuleName ='$Selected'";
        $result1 =mysqli_query($dbcon,$sql6);
        $rowcount1 = mysqli_num_rows($result1);

        $sql3 = "DELETE FROM markandfeedback WHERE Criteria3 = 'Criteria' ";
        if (mysqli_query($dbcon, $sql3))
        {
            $sql4 ="DELETE FROM markandfeedback WHERE TPNumber = ''";
            if (mysqli_query($dbcon, $sql4))
            {

            }

        }
    }// close else
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
</head>

<body>
<div class="container">

    <!-- Static navbar -->
    <form name="frmLogIn" method="POST" action="ViewAssignment.php" enctype="multipart/form-data">
        <center><img src="./Home _ WebSpace_files/maersk-line-logo2.jpg" height="200" width="200"></center>
        <div class="form-group col-lg-20">
            <label for="exampleInputFile">Select The Container Name</label>
        <br>
                <?php
                $data = $_SESSION["Manager"];
                $sql1 = "select ModuleName from assignment WHERE LecturerName ='$data[0]' ";
                $run1=mysqli_query($conn,$sql1);

                echo "<select name='ModuleName'>";
                echo "<option value='1'>(Container Name)</option>";
                while ($row1=mysqli_fetch_array($run1))
                {
                    echo"<option value='".$row1['ModuleName']."'>".$row1['ModuleName']."</option>";
                }
                echo"</select>";
                ?>
                <!-- <select class="form-control input-lg">...</select>-->
            </div>
            <div class="form-group col-lg-20">
                <input type="submit" name="ViewAssignment" value="View Importer Details">
            </div>
            <?php
                if (isset($_POST['ViewAssignment']))
                {
                    $ModuleName = $_POST['ModuleName'];
                    if ($ModuleName == '1')
                    {
                        echo "<script>alert('Please Choose The Container Name')</script>";
                    }
                    else {
                        $sql2 = "select ModuleCode from assignment WHERE ModuleName ='$ModuleName' ";
                        $run2 = mysqli_query($dbcon, $sql2);
                        $row2 = mysqli_fetch_array($run2);
                        $_SESSION['AssignmentInfo'] = $row2;
                        $subject = $row2[0];
                        if ($handle = opendir('/FYP/' . $subject)) {
                            while (false !== ($file = readdir($handle))) {
                                if ($file != "." && $file != "..") {
                                    echo $thelist = '<li><a href=' . $subject . '/' . $file . '>' . $file . '</a></li>';
                                }
                            }
                            closedir($handle);
                        }
                    }
                }
            ?>
        <div class="form-group col-lg-20">
            <input type="submit" name="MarkAssignment" value="View Exporter Details">
        </div>
        <div class="form-group col-lg-20">
            <label for="exampleInputFile">Please Upload The new Shipment Data in (.CSV) format. If an update of the shipment is required.</label>
            <input type="file" name="myFile">
        </div>
        <div class="form-group col-lg-20">
            <input type="submit" name="Upload" value="Upload File">
            <input type="submit" name="PreviousPage" value="Previous Page">
        </div>
        <div class="form-group col-lg-20">
            <input type="submit" name="LogOut" value="Log Out">
        </div>
        <br>
        <br>
        <center><h5>© 2018 Copyright.Maersk Line</h5></center>

</div>
</body>





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
