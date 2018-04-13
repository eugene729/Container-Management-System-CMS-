<?php
$name = 'stevangianot@gmail.com';
       $expiry_date = '2018-01-04 0:00:00';
       $dt = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur'));
       $submission_date = $dt->format('Y-m-d H:i:s');
        echo $submission_date;

       if($submission_date > $expiry_date)
           echo "late submittion";
       else
           echo "accepted";





//mail(''.$name,'pepek','NGENTOT KAU ANJING','From: Draxler');
?>
