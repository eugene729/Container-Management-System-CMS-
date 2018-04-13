<?php

session_start();
if(isset($_POST['Submit']))
{
    include('connection.php');

    $user_Name=$_POST['txtUserName'];
    $user_Pass=$_POST['txtPassword'];

    if ($user_Name == "" || $user_Pass == "")
    {
        echo "<script>alert('Please enter the username and password')</script>";
    }
    else
    {
        $check_staff="select * from staff WHERE Username='$user_Name'AND Password='$user_Pass'";
        $getResults = sqlsrv_query($conn,$connectionOptions,$check_staff);
        $row = sqlsrv_fetch_array($getResults,$conn,connectionOptions);

        if(mysqli_num_rows($getResults))
        {
            $_SESSION['Staff']=$row;//here session is used and value of $user_email store in $_SESSION.
            header("Location: StudentChoice.php");

        }
        else
        {
            $check_manager = "select * from manager WHERE Username='$user_Name'AND Password='$user_Pass'";
            $getResults1 = sqlsrv_query($conn, $check_manager);
            $row1 = sqlsrv_fetch_array($getResults1);

            if (mysqli_num_rows($getResults1))
            {

                $_SESSION['Manager'] = $row1;//here session is used and value of $user_email store in $_SESSION.
                header("Location: LecturerChoice.php");

            }
            else
            {
                $check_admin = "select * from admin WHERE Username='$user_Name'AND Password='$user_Pass'";
                $$getResults2 = sqlsrv_query($con, $check_admin);
                $row2 = sqlsrv_fetch_array($getResults2);
                if (mysqli_num_rows($getResults2))
                {

                    $_SESSION['Admin'] = $row2;//here session is used and value of $user_email store in $_SESSION.
                    header("Location: AdminChoice.php");

                }
                else
                {
                    echo "<script>alert('Username or password is incorrect!')</script>";
                }
            }
        }
    }
}
?>
<!-- saved from url=(0162)http://titan.apiit.edu.my/db_authentication/login.asp?REDIRECTPAGE=http://lms.apiit.edu.my/login/login.php&APPID=MOODLE&SID=fd58h6us81r1cbne31hbbo2bs3&ER=URI&CID= -->
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="APU/stylesheet.css">

</head>

<body>



<div align="center">
    <form name="frmLogIn" method="POST" action="Login.php">
        <table width="300" border="1" cellpadding="0" cellspacing="0">
            <tbody><tr>
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="2">
                        <tbody><tr>
                            <td colspan="2" align="center" class="tdheader1"><b>Maerks Line System Simple Login Interface</b></td>
                        </tr>
                        <tr>
                            <td class="main" align="right">Username : </td>
                            <td class="main"><input type="text" name="txtUserName" size="25"></td>
                        </tr>
                        <tr>
                            <td class="main" align="right">Password : </td>
                            <td class="main"><input type="password" name="txtPassword" size="25"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="hidden" name="SID" value="fd58h6us81r1cbne31hbbo2bs3">
                                <input type="hidden" name="APPID" value="MOODLE">
                                <input type="hidden" name="return_url" value="">
                                <input type="hidden" name="token" value="">
                                <input type="hidden" name="ER" value="URI">
                                <input type="hidden" name="CID" value="">
                                <input type="submit" name="Submit" value="Login">
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            </tbody></table><div align="center">
            <font color="red">

            </font>
        </div><table>






        </table></form></div>
</body>
</html>