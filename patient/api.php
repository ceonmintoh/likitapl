<?php
include("../connection.php");
$response=array();
if($database)
{
    $i=0;
    $q="select * from hospital";
    $r=mysqli_query($database,$q);
    if($r)
    {
        while($row=mysqli_fetch_assoc($r))
        {
$response[$i]['name']=$row['name'];
$response[$i]['latitude']=$row['latitude'];
$response[$i]['longitude']=$row['longitude'];
$i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
}
?>



