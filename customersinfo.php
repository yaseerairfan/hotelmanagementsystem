<?php
include "connect.php";
$new_connect3=new Connection('localhost','root','','hotelmanagementsystem','customes_info','3000');
$query='';
$data=array();
$records_per_page=10;
$start_from=0;
$current_page_number=0;
if(isset($_POST["rowCount"])){

    $records_per_page=$_POST["rowCount"];
}
else{
    $records_per_page=10;
}
if(isset($_REQUEST['current'])){
    $current_page_number=$_REQUEST['current'];
}
else{
    $current_page_number=1;
}
$start_from=($current_page_number-1)*$records_per_page;
$query.="
 SELECT * FROM customes_info
";
if(!empty($_POST["searchPhrase"])){
    $query.='WHERE(customer_id LIKE "%'.$_POST["searchPhrase"].'%" ';
    $query.='OR firstname LIKE "%'.$_POST["searchPhrase"].'%" ';
    $query.='OR lastname LIKE "%'.$_POST["searchPhrase"].'%" ';
    $query.='OR username LIKE "%'.$_POST["searchPhrase"].'%" ';
    $query.='OR password LIKE "%'.$_POST["searchPhrase"].'%" ';
    $query.='OR room_no LIKE "%'.$_POST["searchPhrase"].'%" ';
    $query.='OR gender LIKE "%'.$_POST["searchPhrase"].'%" ';
    $query.='OR email LIKE "%'.$_POST["searchPhrase"].'%" ';
    $query.='OR cnic LIKE "%'.$_POST["searchPhrase"].'%" ';
    $query.='OR phone_no LIKE "%'.$_POST["searchPhrase"].'%") ';

}
if($records_per_page!=-1){
    $query.="LIMIT ".$start_from.",".$records_per_page;
}
$result = $new_connect3->new_connect()->query($query);
while($row = $result->fetch_assoc()) {
    $data[]=$row;
}
// print_r($data);
$total_records=mysqli_num_rows($result);
$output=array(
    'current'=>$current_page_number,
    'rowCount'=>10,
    'total'=>34,
    'rows'=>$data
);
echo json_encode($output);
?>