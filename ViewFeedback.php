<?php
    if (isset($_POST['LogOut']))
    {
        header("Location: Login.php");
    }
    if (isset($_POST['PreviousPage']))
    {
        header("Location: StudentChoice.php");
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

<div class="form-group col-lg-20">
    <form name="frmLogIn" method="POST" action="ViewFeedback.php">
        <center><img src="./Home _ WebSpace_files/maersk-line-logo2.jpg" height="200" width="200"></center>
        <center><h2>View Previous Shipment and Available Containers<h2></center>
        <table align="center" width="600" border="1" cellpadding="1" cellspacing="1">
            <tr>
                <?php
                include('connection.php');
                $sql = "select * from markandfeedback WHERE TPNumber = 'TPNumber'"; //producttest
                $run=mysqli_query($dbcon,$sql);
                while ($row = mysqli_fetch_array($run))
                {
                    echo "<tr>";
                    echo "<th> Facts </th>";
                    echo "<th>".$row['Fact1']."</th>";
                    echo "<th>".$row['Fact2']."</th>";
                    echo "<th>".$row['Fact3']."</th>";
                    echo "<th>".$row['Fact4']."</th>";
                    echo "<th>".$row['Fact5']."</th>";
                    echo "<th>".$row['FinalTest']."</th>";
                    echo "<th>".$row['Feedback']."</th>";
                    echo "<tr>";
                }

                ?>
            <tr>
            <?php
                session_start();
                $data = $_SESSION["Staff"];
                $Username = $data[0];
                $sql1 = "select * from producttest WHERE StaffName = '$Username'";
                $run1=mysqli_query($conn,$sql1);
                while ($row1 = mysqli_fetch_array($run1))
                {
                    echo "<tr>";
                    echo "<th> Grade </th>";
                    echo "<td>".$row1['Grade1']."</td>";
                    echo "<td>".$row1['Grade2']."</td>";
                    echo "<td>".$row1['Grade3']."</td>";
                    echo "<td>".$row1['Grade4']."</td>";
                    echo "<td>".$row1['Grade5']."</td>";
                    echo "<td>".$row1['FinalGrade']."</td>";
                    echo "<td>".$row1['Feedback']."</td>";
                    echo "</tr>";
                }

            ?>

        </table>
        <br>
        <center>
            <input type="submit" name="PreviousPage" value="Previous Page">
            <input type="submit" name="LogOut" value="Log Out">
        </center>
        <br>
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
