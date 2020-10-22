<?php
include "connect.php";

$new_connect2=new Connection('localhost','root','','hotelmanagementsystem','customes_info','3000');

$sql = "SELECT COUNT(customer_id) AS Total,room_no
FROM customes_info
GROUP BY room_no";
$result = $new_connect2->new_connect()->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $arr=array(
        'name'=>$row['room_no'],
        'low'=>intval($row['Total'])
    );
    $dataarray[]=$arr;
  }
  
echo json_encode($dataarray) ;

// echo json_encode($dataarray);
 

  // xhttp.open("POST", "index.php", true);
  // xhttp.send($x);
} else {
  echo "0 results";
}
$new_connect2->new_connect()->close();

?>