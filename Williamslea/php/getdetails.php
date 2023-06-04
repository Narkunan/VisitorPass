<?php
try{
require("trial.php");
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
    
if(empty($aname)==false && empty($apass)==false){
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
        <center><h1>Some Fields are Missing</h1><br><a href='../html/admin.html'><button>Go Back</button></a></center></body></html>";
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
  global $obj;   
      try{
        
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
                                            <th>Entry Date</th>
                                        </tr>";
        while($row=mysqli_fetch_assoc($resultquery)){
            $decryptname=$obj->decrypt(strval($row['Vname']),2);
            $decryptcontact=$obj->decryptcontact(strval($row['contact']));
            $decryptpurpose=$obj->decrypt(strval($row['purpose']),3);
            $decryptidcard=$obj->decrypt(strval($row['id_card_type']),4);
            $decryptidcardno=$obj->decryptcardno(strval($row['id_card']),5);
            echo "<tr>";
                                    echo "<td>" . $decryptname . "</td>";
                                    echo "<td>" . $decryptcontact. "</td>";
                                    echo "<td>" . $decryptpurpose. "</td>";
                                    echo "<td>" .  $decryptidcard. "</td>";
                                    echo "<td>" . $decryptidcardno . "</td>";
                                     echo "<td>" . $row['entrydate'] . "</td>";
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
$adminobj->checkempty();
?>