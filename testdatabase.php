<?php
include "connect.php";

$new_connect1=new Connection('localhost','root','','mydb','test','3000');

$sql = "SELECT * FROM test";
$result = $new_connect1->new_connect()->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $arr=array(
        'name'=>$row['name'],
        'data'=>array_map('intval',explode(',',$row['data']))
    );
    $seriesarray[]=$arr;
  }
  return json_encode($seriesarray);
} else {
  echo "0 results";
}
$new_connect1->new_connect()->close();

?>