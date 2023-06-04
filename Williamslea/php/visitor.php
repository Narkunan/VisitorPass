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
echo "<html><head><title>getdetails</title><style>body{
background-color:black;
color:white;
    }
    button{
        background-color:black;
        color:white;
        font-size:25px;
    }
    </style>
    </head>
    <body>
        <center><h1>Some Fields are Missing</h1><br><a href='../html/index.html'><button>Go Back</button></a></center></body></html>";
   
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
    $vnameencrypt=$obj->encrypt($vname,2);
  $vcontactencrypt=$obj->vcontactencrypt($vcontact);
    $vpurposeencrypt=$obj->encrypt($vpurpose,3);
    $vidcardencrypt=$obj->encrypt($vidcard,4);
    $vidcardnoencrypt=$obj->encryptcardno($vidcardno,5);
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
