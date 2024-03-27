
<?php 
$userProfile= $_SESSION["user"];

if($userProfile == true){

}else{
  header('location:../client/login.php');
}
?>
