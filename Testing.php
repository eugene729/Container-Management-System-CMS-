<?php
session_start();
include('connection.php');
$SelectedModule = $_SESSION["SelectedAssingment"];
$output='';
$sql = "select * from markingCriteria WHERE LecturerName = '$data[0]' AND ModuleName ='$SelectedModule'";
$result =mysqli_query($dbcon,$sql);
if (mysqli_num_rows($result))
{
    $output .='
        <table class="table" bordered="1">
            <tr>
                
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Criteria</th>
                <th></th>
                <th></th>
                <th></th>
            <tr>
                <th>StudentName</th>
                <th>TPNumber</th>
    ';
    while($row = mysqli_fetch_array($result))
    {
        $output .='
                
                <th>'.$row['Criteria1'].' - '.$row['Weightage1'].' </th>
                <th>Grade</th>
                <th>'.$row['Criteria2'].' - '.$row['Weightage2'].' </th>
                <th>Grade</th>
                <th>'.$row['Criteria3'].' - '.$row['Weightage3'].' </th>
                <th>Grade</th>
                <th>'.$row['Criteria4'].' - '.$row['Weightage4'].' </th>
                <th>Grade</th>
                <th>'.$row['Criteria5'].' - '.$row['Weightage5'].' </th>
                <th>Grade</th>
                
        ';
    }
    $output .='
                
                <th>Total Mark</th>
                <th>Final Grade</th>
                <th>Feedback</th>
        ';
    $sql1 = "select StudentName, TPNumber from submittedassignment WHERE ModuleName ='$SelectedModule'";
    $result1 =mysqli_query($dbcon,$sql1);
    $rowcount = mysqli_num_rows($result1);

    $DistinctionCriteria1 = 0;
    $CreditCriteria1 = 0;
    $PassCriteria1 = 0;
    $MarginalFailCriteria1 = 0;

    $DistinctionCriteria2 = 0;
    $CreditCriteria2 = 0;
    $PassCriteria2 = 0;
    $MarginalFailCriteria2 = 0;

    $DistinctionCriteria3 = 0;
    $CreditCriteria3 = 0;
    $PassCriteria3 = 0;

    $DistinctionCriteria4 = 0;
    $CreditCriteria4 = 0;
    $PassCriteria4 = 0;
    $MarginalFailCriteria4 = 0;

    $DistinctionCriteria5 = 0;
    $CreditCriteria5 = 0;
    $PassCriteria5 = 0;
    $MarginalFailCriteria5 = 0;

    $result2 =mysqli_query($dbcon,$sql);
    while ($row2 = mysqli_fetch_array($result2))
    {
        $DistinctionCriteria1 = 0.75 * $row2['Weightage1'];
        $CreditCriteria1 = 0.65 * $row2['Weightage1'];
        $PassCriteria1 = 0.5 * $row2['Weightage1'];
        $MarginalFailCriteria1 = 0.4 * $row2['Weightage1'];

        $DistinctionCriteria2 = 0.75 * $row2['Weightage2'];
        $CreditCriteria2 = 0.65 * $row2['Weightage2'];
        $PassCriteria2 = 0.5 * $row2['Weightage2'];
        $MarginalFailCriteria2 = 0.4 * $row2['Weightage2'];

        $DistinctionCriteria3 = 0.75 * $row2['Weightage3'];
        $CreditCriteria3 = 0.65 * $row2['Weightage3'];
        $PassCriteria3 = 0.5 * $row2['Weightage3'];
        $MarginalFailCriteria3 = 0.4 * $row2['Weightage3'];

        $DistinctionCriteria4 = 0.75 * $row2['Weightage4'];
        $CreditCriteria4 = 0.65 * $row2['Weightage4'];
        $PassCriteria4 = 0.5 * $row2['Weightage4'];
        $MarginalFailCriteria4 = 0.4 * $row2['Weightage4'];

        $DistinctionCriteria5 = 0.75 * $row2['Weightage5'];
        $CreditCriteria5 = 0.65 * $row2['Weightage5'];
        $PassCriteria5 = 0.5 * $row2['Weightage5'];
        $MarginalFailCriteria5 = 0.4 * $row2['Weightage5'];
    }

    while($row1 = mysqli_fetch_array($result1))
    {
        $output .='
                
                <tr>
                    <th>'.$row1[0].' </th>
                    <th>'.$row1[1].' </th>
                    <th></th>
                    <th>=IF(C3>='.$DistinctionCriteria1.',"Distinction",IF(C3>='.$CreditCriteria1.',"Credit",(IF(C3>='.$PassCriteria1.',"Pass",IF(C3>='.$MarginalFailCriteria1.',"Marginal Fail","Fail")))))</th>
                    <th></th>
                    <th>=IF(E3>='.$DistinctionCriteria2.',"Distinction",IF(E3>='.$CreditCriteria2.',"Credit",(IF(E3>='.$PassCriteria2.',"Pass",IF(E3>='.$MarginalFailCriteria2.',"Marginal Fail","Fail")))))</th>
                    <th></th>
                    <th>=IF(G3>='.$DistinctionCriteria3.',"Distinction",IF(G3>='.$CreditCriteria3.',"Credit",(IF(G3>='.$PassCriteria3.',"Pass",IF(G3>='.$MarginalFailCriteria3.',"Marginal Fail","Fail")))))</th>
                    <th></th>
                    <th>=IF(I3>='.$DistinctionCriteria4.',"Distinction",IF(I3>='.$CreditCriteria4.',"Credit",(IF(I3>='.$PassCriteria4.',"Pass",IF(I3>='.$MarginalFailCriteria4.',"Marginal Fail","Fail")))))</th>
                    <th></th>
                    <th>=IF(K3>='.$DistinctionCriteria5.',"Distinction",IF(K3>='.$CreditCriteria5.',"Credit",(IF(K3>='.$PassCriteria5.',"Pass",IF(K3>='.$MarginalFailCriteria5.',"Marginal Fail","Fail")))))</th>
                    <th>=SUM(C3+E3+G3+I3+K3)</th>
                    <th>=IF(M3>79,"A+",IF(M3>74,"A",IF(M3>69,"B+",IF(M3>64,"B",IF(M3>59,"C+",IF(M3>49,"C-",IF(M3>39,"D",IF(M3>29,"F+",IF(M3>19,"F","F-")))))))))</th>
                    <th></th>
         ';
    }
    $output .='
             <tr>
                <th>Total Student Submitted - '.$rowcount.'<th>
          ';

    $output .='</table>';
    header("Context-Type: application/xls");
    header("Content-Disposition: attachment; filename=MarkingSheet.xls");
    echo $output;
}
?>