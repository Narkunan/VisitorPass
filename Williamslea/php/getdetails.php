<?php
try{
require("trial.php");
require("decrypt.php");
}
catch(Exception $e){
    echo "problem with getting file";
}
$aname=$_POST['aname'];
$apass=$_POST['apass'];
$obj=new temp();
class admin { 
public function checkempty(){
    global $aname,$apass,$obj;
    echo $aname,$apass;
if(empty($aname)==false && empty($apass)==false){
    $this->connectioncheck();
   }
   else {
    echo "<h1><a href='../html/admin.html'>Go Back</a><h1>";
   }
}
   
public function connectioncheck(){
    try{
  global $obj;
$conn=$obj->checkconnection();
if($conn){
    
   
    $this->checkadminaccess($conn);
}
}
catch (PDOException $e){
    echo "encountered problem with connection";
}
}
public function checkadminaccess($conn){
    global $aname,$apass;
    $checkstatus;
    try{
    $sql="select * from admin";
    $resultquery=mysqli_query($conn,$sql);
    if(mysqli_num_rows($resultquery)>0){
        while($row=mysqli_fetch_assoc($resultquery)){
            if($aname==$row['username']&&$apass==$row['pass']){
                $checkstatus=true;

            }

        }
    }
    if($checkstatus==true){
        $this->getreport($conn);
    }
    else{
        echo "cannot fetch details";
    }
}
catch(PDOException $e){
    echo "cannot run query";
}
}
public function getreport($conn){
     
      try{
        $dobj=new decrypt();
    $sql="select * from visitor";
    $resultquery=mysqli_query($conn,$sql);
   
    if(mysqli_num_rows($resultquery)>0){

         echo "<html>
         <head>
         <title>getdetails</title>
         <style>
         table{
            background-color:black;
            color:white;
         }
         body{
            background-color:black;
            color:white;
         }
         button{
          background-color:black;
            color:white;  
            height:150px;
            width:100px;
            font-size:25px;
         }
         </style>
         </head>
         <body>
         <center> <table border='1' >
                                        <tr>
                                            <th>Visitor name</th>
                                            <th>Visitor contact</th>
                                            <th>Purpose</th>
                                            <th>ID card type</th>
                                            <th>ID card No</th>
                                        </tr>";
        while($row=mysqli_fetch_assoc($resultquery)){
            $decryptname=$dobj->decryptname(strval($row['Vname']));
            $decryptcontact=$dobj->decryptcontact(strval($row['contact']));
            $decryptpurpose=$dobj->decryptpurpose(strval($row['purpose']));
            $decryptidcard=$dobj->decryptidcard(strval($row['id_card_type']));
            $decryptidcardno=$dobj->decryptidcardno(strval($row['id_card']));
            echo "<tr>";
                                    echo "<td>" . $decryptname . "</td>";
                                    echo "<td>" . $decryptcontact. "</td>";
                                    echo "<td>" . $decryptpurpose. "</td>";
                                    echo "<td>" .  $decryptidcard. "</td>";
                                    echo "<td>" . $decryptidcardno . "</td>";
                                    echo "</tr>";

        }
        echo "</table></center></body></html>";
        echo "<center><a href='../html/admin.html'><button >goback</button></a></center>";
    }
    
}
catch(PDOException $e){
    echo "cannot run query";
}
}
}
$adminobj=new admin();
$adminobj->connectioncheck();
?>