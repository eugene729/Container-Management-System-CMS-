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
    $ModuleName = $_POST['ModuleName'];
    if ($ModuleName == '1')
    {
        echo "<script>alert('Please Select The Module Name')</script>";
    }
    else {
        $SelectedNumber = $_POST['SelectedNumber'];
        $data = $_SESSION["Lecturer"];

        $LecturerName = $data[0];
        if ($SelectedNumber == '1') {
            $Criteria1 = $_POST['Criteria1'];
            $Mark1 = $_POST['Mark1'];
            if ($Criteria1 == "" || $Mark1 == "") {
                echo "<script>alert('Please Fill In The Criteria and The Mark')</script>";
            } else {
                $sql1 = "select ModuleCode from assignment WHERE ModuleName ='$ModuleName' ";
                $run1 = mysqli_query($dbcon, $sql1);
                $row = mysqli_fetch_array($run1);
                $_SESSION['AssignmentInfo'] = $row;
                $sqlinsert = "INSERT INTO markingcriteria (ModuleName, ModuleCode, Criteria1, Weightage1, Criteria2, Weightage2, Criteria3, Weightage3, 
                                                   Criteria4, Weightage4, Criteria5, Weightage5, LecturerName) 
                          VALUES ('$ModuleName','$row[0]','$Criteria1','$Mark1', 
                                                          'Null', '0', 
                                                          'Null', '0',
                                                          'Null', '0',
                                                          'Null', '0',
                                                          '$LecturerName')";
                if (!mysqli_query($dbcon, $sqlinsert)) {
                    die('error');
                } else {
                    echo "<script>alert('Marking Criteria Added Successfully')</script>";
                }
            }
        }
        if ($SelectedNumber == '2') {
            $Criteria1 = $_POST['Criteria1'];
            $Criteria2 = $_POST['Criteria2'];

            $Mark1 = $_POST['Mark1'];
            $Mark2 = $_POST['Mark2'];
            if ($Criteria1 == "" || $Mark1 == "" || $Criteria2 == "" || $Mark2 == "") {
                echo "<script>alert('Please Fill In The Criteria and The Mark')</script>";
            } else {
                $sql1 = "select ModuleCode from assignment WHERE ModuleName ='$ModuleName' ";
                $run1 = mysqli_query($dbcon, $sql1);
                $row = mysqli_fetch_array($run1);
                $_SESSION['AssignmentInfo'] = $row;

                $sqlinsert = "INSERT INTO markingcriteria (ModuleName, ModuleCode, Criteria1, Weightage1, Criteria2, Weightage2, Criteria3, Weightage3, 
                                                   Criteria4, Weightage4, Criteria5, Weightage5, LecturerName) 
                          VALUES ('$ModuleName','$row[0]','$Criteria1','$Mark1', 
                                                          '$Criteria2', '$Mark2', 
                                                          'Null', '0',
                                                          'Null', '0',
                                                          'Null', '0',
                                                          '$LecturerName')";

                if (!mysqli_query($dbcon, $sqlinsert)) {
                    die('error');
                } else {
                    echo "<script>alert('Marking Criteria Added Successfully')</script>";
                }
            }
        }
        if ($SelectedNumber == '3') {

            $Criteria1 = $_POST['Criteria1'];
            $Criteria2 = $_POST['Criteria2'];
            $Criteria3 = $_POST['Criteria3'];

            $Mark1 = $_POST['Mark1'];
            $Mark2 = $_POST['Mark2'];
            $Mark3 = $_POST['Mark3'];
            if ($Criteria1 == "" || $Mark1 == "" || $Criteria2 == "" || $Mark2 == "" || $Criteria3 == "" || $Mark3 == "") {
                echo "<script>alert('Please Fill In The Criteria and The Mark')</script>";
            } else {
                $sql1 = "select ModuleCode from assignment WHERE ModuleName ='$ModuleName' ";
                $run1 = mysqli_query($dbcon, $sql1);
                $row = mysqli_fetch_array($run1);
                $_SESSION['AssignmentInfo'] = $row;

                $sqlinsert = "INSERT INTO markingcriteria (ModuleName, ModuleCode, Criteria1, Weightage1, Criteria2, Weightage2, Criteria3, Weightage3, 
                                                   Criteria4, Weightage4, Criteria5, Weightage5, LecturerName) 
                          VALUES ('$ModuleName','$row[0]','$Criteria1','$Mark1', 
                                                          '$Criteria2', '$Mark2', 
                                                          '$Criteria3', '$Mark3',
                                                          'Null', '0',
                                                          'Null', '0',
                                                          '$LecturerName')";


                if (!mysqli_query($dbcon, $sqlinsert)) {
                    die('error');
                } else {
                    echo "<script>alert('Marking Criteria Added Successfully')</script>";
                }
            }
        }

        if ($SelectedNumber == '4') {

            $Criteria1 = $_POST['Criteria1'];
            $Criteria2 = $_POST['Criteria2'];
            $Criteria3 = $_POST['Criteria3'];
            $Criteria4 = $_POST['Criteria4'];

            $Mark1 = $_POST['Mark1'];
            $Mark2 = $_POST['Mark2'];
            $Mark3 = $_POST['Mark3'];
            $Mark4 = $_POST['Mark4'];

            if ($Criteria1 == "" || $Mark1 == "" || $Criteria2 == "" || $Mark2 == "" || $Criteria3 == "" || $Mark3 == "" || $Criteria4 == "" || $Mark4 == "") {
                echo "<script>alert('Please Fill In The Criteria and The Mark')</script>";
            } else {
                $sql1 = "select ModuleCode from assignment WHERE ModuleName ='$ModuleName' ";
                $run1 = mysqli_query($dbcon, $sql1);
                $row = mysqli_fetch_array($run1);
                $_SESSION['AssignmentInfo'] = $row;

                $sqlinsert = "INSERT INTO markingcriteria (ModuleName, ModuleCode, Criteria1, Weightage1, Criteria2, Weightage2, Criteria3, Weightage3, 
                                                   Criteria4, Weightage4, Criteria5, Weightage5, LecturerName) 
                          VALUES ('$ModuleName','$row[0]','$Criteria1','$Mark1', 
                                                          '$Criteria2', '$Mark2', 
                                                          '$Criteria3', '$Mark3',
                                                          '$Criteria4', '$Mark4',
                                                          'Null', '0',
                                                          '$LecturerName')";

                if (!mysqli_query($dbcon, $sqlinsert)) {
                    die('error');
                } else {
                    echo "<script>alert('Marking Criteria Added Successfully')</script>";
                }
            }
        }

        if ($SelectedNumber == '5') {

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

            if ($Criteria1 == "" || $Mark1 == "" || $Criteria2 == "" || $Mark2 == "" || $Criteria3 == "" || $Mark3 == "" || $Criteria4 == "" || $Mark4 == "" || $Criteria5 == "" || $Mark5 == "") {
                echo "<script>alert('Please Fill In The Criteria and The Mark')</script>";
            } else {
                $sql1 = "select ModuleCode from assignment WHERE ModuleName ='$ModuleName' ";
                $run1 = mysqli_query($dbcon, $sql1);
                $row = mysqli_fetch_array($run1);
                $_SESSION['AssignmentInfo'] = $row;

                $sqlinsert = "INSERT INTO markingcriteria (ModuleName, ModuleCode, Criteria1, Weightage1, Criteria2, Weightage2, Criteria3, Weightage3, 
                                                   Criteria4, Weightage4, Criteria5, Weightage5, LecturerName) 
                          VALUES ('$ModuleName','$row[0]','$Criteria1','$Mark1', 
                                                          '$Criteria2', '$Mark2', 
                                                          '$Criteria3', '$Mark3',
                                                          '$Criteria4', '$Mark4',
                                                          '$Criteria5', '$Mark5',
                                                          '$LecturerName')";


                if (!mysqli_query($dbcon, $sqlinsert)) {
                    die('error');
                } else {
                    echo "<script>alert('Marking Criteria Added Successfully')</script>";
                }
            }
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
        function change() {
            var select = document.getElementById("slct");
            var divv = document.getElementById("container");
            var value = select.value;
            if (value == 1) {
                toAppend =
                    //first row

                    "<input type='text' name='Criteria1' placeholder='Criteria1'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark1' placeholder='Weightage (%)'><br><br>";

                divv.innerHTML=toAppend; return;
            }
            if (value == 2) {
                toAppend =
                    //first row
                    "<input type='text' name='Criteria1' placeholder='Criteria1'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark1' placeholder='Weightage (%)'><br><br>" +
                    //second row
                    "<input type='text' name='Criteria2' placeholder='Criteria2'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark2' placeholder='Weightage (%)'><br><br>";

                divv.innerHTML = toAppend;  return;
            }
            if (value == 3) {
                toAppend =
                    //first row
                    "<input type='text' name='Criteria1' placeholder='Criteria1'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark1' placeholder='Weightage (%)'><br><br>" +
                    //second row
                    "<input type='text' name='Criteria2' placeholder='Criteria2'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark2' placeholder='Weightage (%)'><br><br>" +
                    //third row
                    "<input type='text' name='Criteria3' placeholder='Criteria3'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark3' placeholder='Weightage (%)'><br><br>";

                divv.innerHTML = toAppend;
                return;
            }

            if (value == 4) {
                toAppend =
                    //first row
                    "<input type='text' name='Criteria1' placeholder='Criteria1'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark1' placeholder='Weightage (%)'><br><br>"+
                    //second row
                    "<input type='text' name='Criteria2' placeholder='Criteria2'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark2' placeholder='Weightage (%)'><br><br>"+
                    //third row
                    "<input type='text' name='Criteria3' placeholder='Criteria3'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark3' placeholder='Weightage (%)'><br><br>"+
                    //forth row
                    "<input type='text' name='Criteria4' placeholder='Criteria4'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark4' placeholder='Weightage (%)'><br><br>";

                divv.innerHTML = toAppend;  return;
            }

            if (value == 5) {
                toAppend =
                    //first row
                    "<input type='text' name='Criteria1' placeholder='Criteria1'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark1' placeholder='Weightage (%)'><br><br>"+
                    //second row
                    "<input type='text' name='Criteria2' placeholder='Criteria2'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark2' placeholder='Weightage (%)'><br><br>"+
                    //third row
                    "<input type='text' name='Criteria3' placeholder='Criteria3'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark3' placeholder='Weightage (%)'><br><br>"+
                    //forth row
                    "<input type='text' name='Criteria4' placeholder='Criteria4'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark4' placeholder='Weightage (%)'><br><br>"+
                    //fifth row
                    "<input type='text' name='Criteria5' placeholder='Criteria5'>&nbsp;&nbsp;" +
                    "<input id= 'txtChar' onkeypress= 'return isNumberKey(event)' type='text' name='Mark5' placeholder='Weightage (%)'><br><br>";

                divv.innerHTML = toAppend;  return;
            }
        }
    </script>
</head>
<body>
<form id="form1" align="center" method="POST" action="SetMarkingCriteria.php">
    <div class="form-group col-lg-20">
        <img src="APU/APULogo.jpg" height="200" width="200">
        <h2> Set Marking Criteria </h2>
        Please Select The Module Name
        <br>
        <br>
    </div>
    <div class="form-group col-lg-20">

        <?php
        $data = $_SESSION["Lecturer"];
        $sql1 = "select ModuleName from assignment WHERE LecturerName ='$data[0]' ";
        $run1=mysqli_query($dbcon,$sql1);

        echo "<select name='ModuleName'>";
        echo"<option value = '1'>(Module Name)</option>";
        while ($row1=mysqli_fetch_array($run1))
        {
            echo"<option value='".$row1['ModuleName']."'>".$row1['ModuleName']."</option>";
        }
        echo"</select>";
        ?>
        <br>
        <br>
    </div>
    <div class="form-group col-lg-20">
        Please Select How Many Criteria You Want To Put
        <br>
        <br>
    </div>
    <div class="form-group col-lg-20">
        <select name = 'SelectedNumber' id='slct'  onchange=change(); ">
        <option>(Select Number)</option>
        <option value="1"> 1 </option>
        <option value="2"> 2 </option>
        <option value="3"> 3 </option>
        <option value="4"> 4 </option>
        <option value="5"> 5 </option>
        </select>
        <br>
        <br>
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
