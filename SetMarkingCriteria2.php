<?php
session_start();
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
    $data = $_SESSION["Lecturer"];
    $ModuleName = $_POST['ModuleName'];
    $LecturerName = $data[0];

    $Criteria1 = $_POST['Criteria1'];
    $Criteria2 = $_POST['Criteria2'];
    $Criteria3 = $_POST['Criteria3'];
    $Criteria4 = $_POST['Criteria4'];
    $Criteria5 = $_POST['Criteria5'];

    $Mark1 = $_POST['Mark1'];
    $Mark2 = $_POST['Mark2'];
    $Mark3 = $_POST['Mark3'];
    $Mark4 = $_POST['Mark4'];
    $Mark5 = $_POST['Mark5'];

    if ($Criteria1 == "" || $Mark1 == "" || $Criteria2 == "" || $Mark2 == "" || $Criteria3 == "" || $Mark3 == "" || $Criteria4 == "" || $Mark4 == ""|| $Criteria5 == "" || $Mark5 == "")
    {
        echo "<script>alert('Please Fill In The Criteria and The Mark')</script>";
    }
    else
    {
        $sql1 = "select ModuleCode from assignment WHERE ModuleName ='$ModuleName' ";
        $run1 = mysqli_query($dbcon, $sql1);
        $row = mysqli_fetch_array($run1);
        $_SESSION['AssignmentInfo'] = $row;

        $sqlinsert = "INSERT INTO markingcriteria (ModuleName, ModuleCode, Criteria1, Weightage1, Criteria2, Weightage2, Criteria3, Weightage3, 
                                                   Criteria4, Weightage4, Criteria5, Weightage5, LecturerName) 
                      VALUES ('$ModuleName','$row[0]','$Criteria1','$Mark1','$Criteria2','$Mark2','$Criteria3','$Mark3',
                              '$Criteria4','$Mark4','$Criteria5','$Mark5','$LecturerName')";


        if (!mysqli_query($dbcon, $sqlinsert)) {
            die('error');
        } else {
            echo "<script>alert('Marking Criteria Added Successfully')</script>";
        }
    }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        function isNumberKey(evt) // check for nnumbers only
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
    </script>
</head>
<body>
<form align="center" id="form1" method="POST" action="SetMarkingCriteria2.php">
    <div class="form-group col-lg-20">
        <img src="APU/APULogo.jpg" height="200" width="200">
        <h2> Add Assessment </h2>
        <h3>Please Select The Module Name</h3>
    </div>
    <div class="form-group col-lg-20">
        <?php
        $data = $_SESSION["Lecturer"];
        $sql1 = "select ModuleName from assignment WHERE LecturerName ='$data[0]' ";
        $run1=mysqli_query($dbcon,$sql1);

        echo "<select name='ModuleName'>";
        while ($row1=mysqli_fetch_array($run1))
        {
            echo"<option value='".$row1['ModuleName']."'>".$row1['ModuleName']."</option>";
        }
        echo"</select>";
        ?>
    </div>
    <div class="form-group col-lg-20">
        <h3>Please Input The Criteria</h3>
    </div>
    <div class="form-group col-lg-20">
        <input type='text' name='Criteria1' placeholder='Criteria 1'>&nbsp;&nbsp;
        <input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark1' placeholder='Weightage (%)'><br><br>

        <input type='text' name='Criteria2' placeholder='Criteria 2'>&nbsp;&nbsp;
        <input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark2' placeholder='Weightage (%)'><br><br>

        <input type='text' name='Criteria3' placeholder='Criteria 3'>&nbsp;&nbsp;
        <input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark3' placeholder='Weightage (%)'><br><br>

        <input type='text' name='Criteria4' placeholder='Criteria 4'>&nbsp;&nbsp;
        <input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark4' placeholder='Weightage (%)'><br><br>

        <input type='text' name='Criteria5' placeholder='Criteria 5'>&nbsp;&nbsp;
        <input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark5' placeholder='Weightage (%)'><br><br>

    </div>

    <div class="form-group col-lg-20" id="container">
    </div><!-- Place to Put the Text Box -->
    <div class="form-group col-lg-20">
        <input type="Submit" value="Submit" name="Submit">
        <input type="Submit" name="PreviousPage" value="Previous Page">
        <input type="Submit" name="LogOut" value="Log Out">
    </div>

    <center><h5>© 2018 Copyright Mamak Kau</h5></center>
</form>
</body>
</html>
