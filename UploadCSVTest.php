<?php
include('connection.php');
if (isset($_POST['uploadBtn']))
{
    $fileName = $_FILES['myFile']['name'];
    $fileTmpName = $_FILES['myFile']['tmp_name'];
    // lets find the extension of file
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    // lets check what is the extension
    $allowedType = array('csv');
    if(!in_array($fileExtension, $allowedType)) {?>
            <div class ="alert alert-danger">
                Invalid File Extension
            </div>
        <?php }
        else
        {
            //upload your file
            $handle = fopen($fileTmpName,'r');//read mode 'r'
            while(($myData = fgetcsv($handle,1000,',')) !== FALSE)
            {
                $StaffName = $myData[0];
                $StaffID = $myData[1];
                $Fact1 = $myData[2];
                $Fact2 = $myData[3];
                $Fact3 = $myData[4];
                $Fact4 = $myData[5];
                $Fact5 = $myData[6];
                $TotalMark = $myData[7];
                $Feedback = $myData[8];

                $query = "insert into producttest (StaffName, StaffID, Fact1, Fact2, Fact3, Fact4, Fact5, TotalTest, Feedback) VALUES  
                          ('".$StaffName."','".$StaffID."','".$Fact1."','".$Fact2."','".$Fact3."','".$Fact4."','".$Fact5."'
                          ,'".$TotalTest."','".$Feedback."')";
                $run = mysqli_query($dbcon, $query);
            }
            if (!$run)
            {
                die("error");
            }
            else
            {
                {?>
                    <div class ="alert alert-success">
                        FIle Uplaoded
                    </div>
                <?php }

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

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputFile">File upload for Shipment Data with a 'shipmentdata.csv' extension. (Regarding Importer, Exporter, Goods Details and Shipment location)</label>
			
            <input type="file" name="myFile" class="form-control">
        </div>
		
        <input type="submit" class="btn btn-default" name="uploadBtn"></input>

		<label for="exampleInputFile">Shipment Data File will be analyze by a designated Admin.</label>
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
