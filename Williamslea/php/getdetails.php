<?php
try
{
 require("ende.php");
}
catch(Exception $e)
{
    echo "problem with getting file";
}
$a_name=$_POST['aname'];
$a_pass=$_POST['apass'];
$obj=new Temp();
class Admin 
{ 
   public function checkEmpty()
   {
      global $a_name,$a_pass,$obj;
    
      if(empty($a_name)==false && empty($a_pass)==false)
      {
        $this->connectioncheck();
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
             <a href='../html/admin.html'><button>Go Back</button></a>
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
       $this->checkadminaccess($conn);
      }
    }
    catch (PDOException $e)
    {
    echo "encountered problem with connection";
    }
}
public function checkAdminAccess($conn)
{
    global $a_name,$a_pass;
    $checkstatus;
    try
    {
      $sql="select * from admin";
      $resultquery=mysqli_query($conn,$sql);
      if(mysqli_num_rows($resultquery)>0)
      {
        while($row=mysqli_fetch_assoc($resultquery))
        {
            if($a_name==$row['username']&&$a_pass==$row['pass'])
            {
                $checkstatus=true;

            }

         }
       }
      if($checkstatus==true)
      {
        $this->getreport($conn);
      }
      else
      {
        echo "cannot fetch details";
      }
    }
    catch(PDOException $e)
    {
      echo "cannot run query";
    }
 }
public function getReport($conn)
{
  global $obj;   
  try
  {
        
     $sql="select * from visitor";
     $resultquery=mysqli_query($conn,$sql);
   
     if(mysqli_num_rows($resultquery)>0)
     {

        echo "<html>
              <head>
              <title>getdetails</title>
              <style>
              table
              {
               background-color:black;
               color:white;
              }
              body
              {
               background-color:black;
               color:white;
               }
               button
               {
                background-color:black;
                color:white;  
                height:150px;
                width:100px;
                font-size:25px;
               }
              </style>
              </head>
              <body>
              <center> 
              <table border='1' >
              <tr>
              <th>Visitor name</th>
              <th>Visitor contact</th>
              <th>Purpose</th>
              <th>ID card type</th>
              <th>ID card No</th>
              <th>Entry Date</th>
              </tr>";
        while($row=mysqli_fetch_assoc($resultquery))
        {
            $decryptname=$obj->decrypt(strval($row['Vname']),2);
            $decryptcontact=$obj->decryptContact(strval($row['contact']));
            $decryptpurpose=$obj->decrypt(strval($row['purpose']),3);
            $decryptidcard=$obj->decrypt(strval($row['id_card_type']),4);
            $decryptidcardno=$obj->decryptCardNo(strval($row['id_card']),5);
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
   catch(PDOException $e)
   {
     echo "cannot run query";
   }
  }
}
$adminobj=new Admin();
$adminobj->checkEmpty();
?>