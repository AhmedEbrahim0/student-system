<?php
$link=mysqli_connect("localhost","root","","student",3306);
$select="select * from homework";
$query=mysqli_query($link,$select);
$array=[];
while($row=mysqli_fetch_assoc($query)){
array_push($array,$row);
}
echo json_encode($array);
