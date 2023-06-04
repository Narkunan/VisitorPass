<?php
try
{
 require ("ende.php");
 require("pdfgenerator.php");
}
catch(FileNotFoundException $e)
{
  echo "problem with getting required file";
}
$v_name=$_POST['name'];
$v_contact=$_POST['Vcontact'];
$v_purpose=$_POST['Vpurpose'];
$v_idcard=$_POST['Vidcard'];
$v_idcard_no=$_POST['vidno'];
$obj=new Temp(); 
$obj1=new Generators();
class Visitor
{
   
   public function checkEmpty()
   {
    global $v_name,$v_contact,$v_purpose,$v_idcard,$v_idcard_no,$obj;
    if(empty($v_name)==false && empty($v_contact)==false && empty($v_purpose)==false && empty($v_idcard)==false && empty($v_idcard_no)==false)
    {
       $this->connectionCheck();
    }
    else 
    {
       echo "<html>
       <head>
       <title>getdetails</title>
       <style>
       body{
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
       <center>
       <h1>Some Fields are Missing</h1>
       <br>
       <a href='../html/index.html'><button>Go Back</button></a>
       </center>
       </body>
       </html>";
   
     }
    }
   
public function connectionCheck()
{
try
{
   global $obj;
   $conn=$obj->checkConnection();
   if($conn)
   {
    
    $this->executeQuery($conn);
   }
 }
 catch (PDOException $e)
 {
    echo "encountered problem with connection";
  }
}
public function executeQuery($conn)
{
 try
 {
    global $v_name,$v_contact,$v_purpose,$v_idcard,$v_idcard_no,$obj,$obj1;
    $vnameencrypt=$obj->encrypt($v_name,2);
    $vcontactencrypt=$obj->vContactEncrypt($v_contact);
    $vpurposeencrypt=$obj->encrypt($v_purpose,3);
    $vidcardencrypt=$obj->encrypt($v_idcard,4);
    $vidcardnoencrypt=$obj->encryptCardNo($v_idcard_no,5);
    date_default_timezone_set("Asia/Calcutta");
    $dateofthe=date("Y-m-d h:i:sa");
    $sqlquery="INSERT INTO visitor values('$vnameencrypt','$vcontactencrypt','$vpurposeencrypt','$vidcardencrypt','$vidcardnoencrypt','$dateofthe')";
    $result=mysqli_query($conn,$sqlquery);
    if($result)
    {
       try
       {
        $obj1->generatePdf($v_name,$v_contact,$v_purpose,$v_idcard,$v_idcard_no,$dateofthe);
       }
       catch(Exception $e)
       {
       echo "problem with generatepdf";
       }
    }
  } 
  catch(Exception $e)
  {
    echo "problem with posting data";
  }
 }
}
$vobject=new Visitor();
$vobject->checkEmpty();
?>
