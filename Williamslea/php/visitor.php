<?php
try{
require ("trial.php");
require("pdfgenerator.php");
}
catch(FileNotFoundException $e){
    echo "problem with getting required file";
}
$vname=$_POST['name'];
$vcontact=$_POST['Vcontact'];
$vpurpose=$_POST['Vpurpose'];
$vidcard=$_POST['Vidcard'];
$vidcardno=$_POST['vidno'];
$obj=new temp(); 
$obj1=new generators();
class visitor{
   
   public function checkempty(){
    global $vname,$vcontact,$vpurpose,$vidcard,$vidcardno,$obj;
if(empty($vname)==false && empty($vcontact)==false && empty($vpurpose)==false && empty($vidcard)==false && empty($vidcardno)==false){
    $this->connectioncheck();
   }
   else {
    echo "<h1><a href='../html/index.html'>Go Back</a><h1>";
   }
}
   
public function connectioncheck(){
    try{
  global $obj;
$conn=$obj->checkconnection();
if($conn){
    
    $this->execute_query($conn);
}
}
catch (PDOException $e){
    echo "encountered problem with connection";
}
}
public function execute_query($conn){
 try{
    global $vname,$vcontact,$vpurpose,$vidcard,$vidcardno,$obj,$obj1;
    $vnameencrypt=$obj->vnameencrypt($vname);
  $vcontactencrypt=$obj->vcontactencrypt($vcontact);
    $vpurposeencrypt=$obj->vpurposeencrypt($vpurpose);
    $vidcardencrypt=$obj->vidcardencrypt($vidcard);
    $vidcardnoencrypt=$obj->vidcardnoencrypt($vidcardno);
    date_default_timezone_set("Asia/Calcutta");
    $dateofthe=date("Y-m-d h:i:sa");
    $sqlquery="INSERT INTO visitor values('$vnameencrypt','$vcontactencrypt','$vpurposeencrypt','$vidcardencrypt','$vidcardnoencrypt','$dateofthe')";
    $result=mysqli_query($conn,$sqlquery);
    if($result){
        try{
        $obj1->generatepdf($vname,$vcontact,$vpurpose,$vidcard,$vidcardno,$dateofthe);
}
catch(Exception $e){
    echo "problem with generatepdf";
    }
}
}
catch(Exception $e){
    echo "problem with posting data";
}
}
}
$vobject=new visitor();
$vobject->checkempty();
?>
