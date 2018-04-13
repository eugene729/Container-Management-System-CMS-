




<?php
$serverName = "cms1x.database.windows.net";
$connectionOptions = array(
    "Database" => "CMSZ",
    "Uid" => "rootdb",
    "PWD" => "0987-abc"
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
//$tsql= "SELECT TOP 20 pc.Name as CategoryName, p.name as ProductName
     //   FROM [SalesLT].[ProductCategory] pc
     //   JOIN [SalesLT].[Product] p
    // ON pc.productcategoryid = p.productcategoryid";
$getResults= sqlsrv_query($conn);
//echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
 //   echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
// echo ($row['CategoryName'] . " " . $row['ProductName'] . PHP_EOL);
}
sqlsrv_free_stmt($getResults);



//DEFINE ('DB_USER','rootdb');
//DEFINE ('DB_PSWD','0987-abc');
//DEFINE ('DB_HOST','cms1x.database.windows.net');
//DEFINE ('DB_NAME','CMSZ');

//Server Name:cms1x
//cms1x.database.windows.net

//$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

//if(!$dbcon)
//{
//    die('error connecting database');
//}
//
?>