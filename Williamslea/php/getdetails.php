<?php 
class admin {
    public function checkConnection() {
        try {
            $host = 'localhost:3306'; // host name
            $username = 'root'; // username
            $pass = ''; // password
            $dbname = 'williamsleavpass'; // dbname

            if (empty($_POST['aname'])==false && empty($_POST['apass'])==false) {
                $aname = $_POST['aname']; // request admin name
                $apass = $_POST['apass']; // request admin pass

                $conn = mysqli_connect($host, $username, $pass, $dbname); // establishing connection

                if (!$conn) {
                    throw new Exception("Problem with connect"); // throw exception if there is a problem with the connection
                }

                $insertQuery = "SELECT * FROM admin";
                $retrievalQuery = mysqli_query($conn, $insertQuery);

                if (mysqli_num_rows($retrievalQuery) > 0) {
                    while ($row = mysqli_fetch_assoc($retrievalQuery)) {
                        if ($row['username'] == $aname && $row['pass'] == $apass) {
                            $selectQuery = "SELECT * FROM visitor";
                            $resultQuery = mysqli_query($conn, $selectQuery);

                            if (mysqli_num_rows($resultQuery) > 0) {
                                echo "<table border='1'>
                                        <tr>
                                            <th>Visitor name</th>
                                            <th>Visitor contact</th>
                                            <th>Purpose</th>
                                            <th>ID card type</th>
                                            <th>ID card No</th>
                                        </tr>";

                                while ($row = mysqli_fetch_assoc($resultQuery)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['Vname'] . "</td>";
                                    echo "<td>" . $row['contact'] . "</td>";
                                    echo "<td>" . $row['purpose'] . "</td>";
                                    echo "<td>" . $row['id_card_type'] . "</td>";
                                    echo "<td>" . $row['id_card'] . "</td>";
                                    echo "</tr>";
                                }

                                echo "</table>";
                            }
                        }
                    }
                } else {
                    throw new Exception("Data not posted");
                }
            } else {
                echo 'some values are missing';
                throw new Exception("Some values are missing");
            }
        } catch (Exception $e) {
            echo "<h1>" . $e->getMessage() . "</h1>";
        }

        echo "<h1><a href='admin.html'>Go back</a></h1>";
    }
}

$obj = new admin();
$obj->checkConnection();
?>