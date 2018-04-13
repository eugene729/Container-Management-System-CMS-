<?php
session_start();
include('connection.php');
$data = $_SESSION["Manager"];
$SelectedModule = $_SESSION["SelectedContainer"];
$output='';
$sql = "select * from producttest WHERE ManagerName = '$data[0]' AND ShipmentName ='$SelectedModule'";
$result =mysqli_query($dbcon,$sql);
if (mysqli_num_rows($result))
{
    $output .='
        <table class="table" bordered="1">
            <tr>
                
                <th></th> //***
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Criteria</th>
                <th></th>
                <th></th>
                <th></th>
            <tr>
                <th>ManagerName:</th>
                <th>ManagerID:</th>
    ';
    while($row = mysqli_fetch_array($result))
    {
        $output .='
                
                <th>'.$row['Fact1'].' - '.$row['Vitality1'].' </th>
                <th>Description</th>
                <th>'.$row['Fact2'].' - '.$row['Vitality2'].' </th>
                <th>Description</th>
                <th>'.$row['Fact3'].' - '.$row['Vitality3'].' </th>
                <th>Description</th>
                <th>'.$row['Fact4'].' - '.$row['Vitality4'].' </th>
                <th>Description</th>
                <th>'.$row['Fact5'].' - '.$row['Vitality5'].' </th>
                <th>Description</th>
                
        ';
    }
    $output .='
                
                <th>TotalTest</th>
                <th>FinalDecision</th>
                <th>Feedback</th>
        ';
    $sql1 = "select StaffName, StaffID from container WHERE ShipmentName ='$SelectedContainer'"; //submittedshipment
    $result1 =mysqli_query($dbcon,$sql1);
    $rowcount = mysqli_num_rows($result1);
	//MOVE ON LATER
    $DescriptionFact1 = 0;
    $CreditFact1 = 0;
    $PassFact1 = 0;
    $MarginalFailFact1 = 0;

    $DescriptionFact2 = 0;
    $CreditFact2 = 0;
    $PassFact2 = 0;
    $MarginalFailFact2 = 0;

    $DescriptionFact3 = 0;
    $CreditFact3 = 0;
    $PassFact3 = 0;

    $DescriptionFact4 = 0;
    $CreditFact4 = 0;
    $PassFact4 = 0;
    $MarginalFailFact4 = 0;

    $DescriptionFact5 = 0;
    $CreditFact5 = 0;
    $PassFact5 = 0;
    $MarginalFailFact5 = 0;
	
    $result2 =mysqli_query($dbcon,$sql);
    while ($row2 = mysqli_fetch_array($result2))
    {
        $DescriptionFact1 = 0.75 * $row2['Vitality1']; 
        $CreditFact1 = 0.65 * $row2['Vitality1'];
        $PassFact1 = 0.5 * $row2['Vitality1'];
        $MarginalFailFact1 = 0.4 * $row2['Vitality1'];

        $DescriptionFact2 = 0.75 * $row2['Vitality2'];
        $CreditFact2 = 0.65 * $row2['Vitality2'];
        $PassFact2 = 0.5 * $row2['Vitality2'];
        $MarginalFailFact2 = 0.4 * $row2['Vitality2'];

        $DescriptionFact3 = 0.75 * $row2['Vitality3'];
        $CreditFact3 = 0.65 * $row2['Vitality3'];
        $PassFact3 = 0.5 * $row2['Vitality3'];
        $MarginalFailFact3 = 0.4 * $row2['Vitality3'];
		
        $DescriptionFact4 = 0.75 * $row2['Vitality4'];
        $CreditFact4 = 0.65 * $row2['Vitality4'];
        $PassFact4 = 0.5 * $row2['Vitality4];
        $MarginalFailFact4 = 0.4 * $row2['Vitality4'];

        $DescriptionFact5 = 0.75 * $row2['Vitality5'];
        $CreditFact5 = 0.65 * $row2['Vitality5'];
        $PassFact5 = 0.5 * $row2['Vitality5'];
        $MarginalFailFact5 = 0.4 * $row2['Vitality5'];
    }

    while($row1 = mysqli_fetch_array($result1))
    {
        $output .='
                
                <tr>
                    <th>'.$row1[0].' </th>
                    <th>'.$row1[1].' </th>
                    <th></th>
                    <th>=IF(C3>='.$DescriptionFact1.',"Description",IF(C3>='.$CreditFact1.',"Credit",(IF(C3>='.$PassFact1.',"Pass",IF(C3>='.$MarginalFailFact1.',"Marginal Fail","Fail")))))</th>
                    <th></th>
                    <th>=IF(E3>='.$DescriptionFact2.',"Description",IF(E3>='.$CreditFact2.',"Credit",(IF(E3>='.$PassFact2.',"Pass",IF(E3>='.$MarginalFailFact2.',"Marginal Fail","Fail")))))</th>
                    <th></th>
                    <th>=IF(G3>='.$DescriptionFact3.',"Description",IF(G3>='.$CreditFact3.',"Credit",(IF(G3>='.$PassFact3.',"Pass",IF(G3>='.$MarginalFailFact3.',"Marginal Fail","Fail")))))</th>
                    <th></th>
                    <th>=IF(I3>='.$DescriptionFact4.',"Description",IF(I3>='.$CreditFact4.',"Credit",(IF(I3>='.$PassFact4.',"Pass",IF(I3>='.$MarginalFailFact4.',"Marginal Fail","Fail")))))</th>
                    <th></th>
                    <th>=IF(K3>='.$DescriptionFact5.',"Description",IF(K3>='.$CreditFact5.',"Credit",(IF(K3>='.$PassFact5.',"Pass",IF(K3>='.$MarginalFailFact5.',"Marginal Fail","Fail")))))</th>
                    <th>=SUM(C3+E3+G3+I3+K3)</th>
                    <th>=IF(M3>79,"A+",IF(M3>74,"A",IF(M3>69,"B+",IF(M3>64,"B",IF(M3>59,"C+",IF(M3>49,"C-",IF(M3>39,"D",IF(M3>29,"F+",IF(M3>19,"F","F-")))))))))</th>
                    <th></th>
         ';
    }
    $output .='
             <tr>
                <th>Total Shipment for Containers Submitted - '.$rowcount.'<th>
          ';

    $output .='</table>';
    header("Context-Type: application/xls");
    header("Content-Disposition: attachment; filename=MarkingSheet.xls");
    echo $output;
}
?>