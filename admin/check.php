<?php 
include '../includes/dbConnect.php';?> 

<?php
$query =  "SELECT * FROM register";
$data = mysqli_query($conn, $query);

$tUser = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
echo $result;
echo $tUser;
if($tUser >0){
    echo "Table has records";

}else{
    echo"No record found";
}
?>
